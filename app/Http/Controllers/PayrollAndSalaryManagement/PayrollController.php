<?php

namespace App\Http\Controllers\PayrollAndSalaryManagement;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\Payroll;
use App\Models\SalaryStructure;
use App\Models\User;
use Illuminate\Http\Request;


class PayrollController extends Controller
{
    // Show all payrolls
    public function index()
    {
        $payrolls = Payroll::with(['employee', 'processor'])->latest()->get();
        return view('panel.essential.payroll_and_salary_management.payroll.index', compact('payrolls'));
    }

    // Show form to process payroll
    public function create()
    {
        $employees = User::role(['employee', 'manager'])->get();
        return view('panel.essential.payroll_and_salary_management.payroll.create', compact('employees'));
    }

    // Store processed payroll
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:users,id',
            'month' => 'required|date_format:Y-m',
        ]);

        $month = $validated['month'] . '-01'; // Convert '2025-05' to '2025-05-01'

        // Check if payroll already exists for that employee and month
        $exists = Payroll::where('employee_id', $validated['employee_id'])
            ->where('month', $month)
            ->first();

        if ($exists) {
            return back()->with('error', 'Payroll already exists for this employee and month.');
        }

        // Get salary structure
        $structure = SalaryStructure::where('employee_id', $validated['employee_id'])
            ->where('is_active', true)
            ->first();

        if (!$structure) {
            return back()->with('error', 'Active salary structure not found for this employee.');
        }

        // Calculate payroll amounts
        $basic = $structure->basic_salary;
        $allowances = $structure->housing_allowance + $structure->transport_allowance + $structure->other_allowances;
        $deductions = 0;


        // --------------------------- deduction calculation

        $deduct_model = Deduction::where('employee_id', $validated['employee_id'])
            ->where('month', $month)
            ->first();

        if ($deduct_model) {
            $deductions = $deduct_model->amount;
        }

        $net = $basic + $allowances - $deductions;

        Payroll::create([
            'employee_id' => $validated['employee_id'],
            'month' => $month, // Use converted Y-m-d format
            'basic_salary' => $basic,
            'allowances' => $allowances,
            'deductions' => $deductions,
            'net_salary' => $net,
            'status' => 'Processed',
            'processed_by' => \auth()->id(),
        ]);

        return redirect()->route('payrolls.index')->with('success', 'Payroll processed successfully.');
    }

//    public function destroy($id)
//    {
//        $payroll = Payroll::find($id);
//
//        if (!$payroll){
//            return back()->with('error', 'Payroll not found.');
//        }
//
//        $payroll->delete();
//        return back()->with('success', 'Payroll deleted successfully.');
//    }

}
