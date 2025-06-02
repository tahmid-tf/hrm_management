<?php

namespace App\Http\Controllers\PayrollAndSalaryManagement;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SalaryStructure;
use Illuminate\Support\Facades\DB;

class SalaryStructureController extends Controller
{

    public function index()
    {
        $structures = SalaryStructure::with('employee')->latest()->get();
        return view('panel.essential.payroll_and_salary_management.salary_structure.index', compact('structures'));
    }

    public function create()
    {
        $employees = User::role(['employee', 'manager'])->get(); // only assignable roles
        return view('panel.essential.payroll_and_salary_management.salary_structure.create_or_edit', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,id|unique:salary_structures,employee_id',
            'basic_salary' => 'required|numeric|min:0',
            'housing_allowance' => 'nullable|numeric|min:0',
            'transport_allowance' => 'nullable|numeric|min:0',
            'other_allowances' => 'nullable|numeric|min:0',
            'effective_from' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        SalaryStructure::create(
            $request->only([
                'employee_id',
                'basic_salary',
                'housing_allowance',
                'transport_allowance',
                'other_allowances',
                'effective_from',
                'is_active',
            ])
        );

        return redirect()->route('salary-structure.index')->with('success', 'Salary structure created.');
    }

    public function edit($id)
    {
        $structure = SalaryStructure::findOrFail($id);
        $employees = User::role(['employee', 'manager'])->get(); // Optional if you allow changing employee
        return view('panel.essential.payroll_and_salary_management.salary_structure.create_or_edit', compact('structure', 'employees'));
    }


    public function update(Request $request, $id)
    {
        $structure = SalaryStructure::findOrFail($id);

        $request->validate([
            'basic_salary' => 'required|numeric|min:0',
            'housing_allowance' => 'nullable|numeric|min:0',
            'transport_allowance' => 'nullable|numeric|min:0',
            'other_allowances' => 'nullable|numeric|min:0',
            'effective_from' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        $structure->update(
            $request->only([
                'basic_salary',
                'housing_allowance',
                'transport_allowance',
                'other_allowances',
                'effective_from',
                'is_active',
            ])
        );

        return redirect()->route('salary-structure.index')->with('success', 'Salary structure updated.');
    }

    // ------------------------------------------- Api Routes

    public function salary_structure_api()
    {
        $monthlyNetSalaries = Payroll::select(
            DB::raw("DATE_FORMAT(month, '%Y-%m') as month"),
            DB::raw("SUM(net_salary) as total_net_salary")
        )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        return response()->json([
            'data' => $monthlyNetSalaries,
        ], 200);
    }

}
