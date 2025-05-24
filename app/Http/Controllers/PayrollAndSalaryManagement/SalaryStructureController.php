<?php

namespace App\Http\Controllers\PayrollAndSalaryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalaryStructure;

class SalaryStructureController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'employee_id' => 'required|exists:users,id',
            'basic_salary' => 'required|numeric',
            'housing_allowance' => 'nullable|numeric',
            'transport_allowance' => 'nullable|numeric',
            'other_allowances' => 'nullable|numeric',
            'effective_from' => 'required|date',
        ]);

        SalaryStructure::where('employee_id', $validated['employee_id'])->update(['is_active' => false]);

        $validated['is_active'] = true;

        SalaryStructure::create($validated);

        return back()->with('success', 'Salary structure updated.');
    }
}
