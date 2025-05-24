<?php

namespace App\Http\Controllers\PayrollAndSalaryManagement;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;


class PayrollController extends Controller
{
    public function processPayroll(Request $request)
    {
        $month = $request->input('month'); // format: YYYY-MM

        $employees = User::whereHas('salaryStructure', fn($q) => $q->where('is_active', true))->get();

        foreach ($employees as $employee) {
            $salary = $employee->salaryStructure; // get active salary

            $allowances = $salary->housing_allowance + $salary->transport_allowance + $salary->other_allowances;

            $deductions = 0; // You can calculate loan EMI or other deductions here

            $net = $salary->basic_salary + $allowances - $deductions;

            Payroll::create([
                'employee_id'   => $employee->id,
                'month'         => $month,
                'basic_salary'  => $salary->basic_salary,
                'allowances'    => $allowances,
                'deductions'    => $deductions,
                'net_salary'    => $net,
                'status'        => 'Processed',
                'processed_by'  => auth()->id(),
            ]);
        }

        return back()->with('success', 'Payroll processed for all employees.');
    }

}
