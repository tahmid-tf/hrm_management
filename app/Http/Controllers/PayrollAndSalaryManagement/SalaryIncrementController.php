<?php

namespace App\Http\Controllers\PayrollAndSalaryManagement;

use App\Http\Controllers\Controller;
use App\Models\SalaryIncrement;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryIncrementController extends Controller
{

    public function index()
    {
        $increments = SalaryIncrement::with(['employee', 'addedBy'])->latest()->get();
        return view('panel.essential.payroll_and_salary_management.salary_increment.index', compact('increments'));
    }

    public function create()
    {
        $employees = User::role(['employee', 'manager'])->get();
        return view('panel.essential.payroll_and_salary_management.salary_increment.create_or_edit', compact('employees'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,id',
            'increment_amount' => 'required|numeric|min:0',
            'effective_date' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        SalaryIncrement::create([
            'employee_id' => $request->employee_id,
            'increment_amount' => $request->increment_amount,
            'effective_date' => $request->effective_date,
            'reason' => $request->reason,
            'added_by' => auth()->id(),
        ]);

        return redirect()->route('salary-increments.index')->with('success', 'Salary increment recorded successfully.');
    }

    public function edit($id)
    {
        $increment = SalaryIncrement::findOrFail($id);
        $employees = User::role(['employee', 'manager'])->get();
        return view('panel.essential.payroll_and_salary_management.salary_increment.create_or_edit', compact('increment', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $increment = SalaryIncrement::findOrFail($id);

        $request->validate([
            'increment_amount' => 'required|numeric|min:0',
            'effective_date' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        $increment->update([
            'increment_amount' => $request->increment_amount,
            'effective_date' => $request->effective_date,
            'reason' => $request->reason,
        ]);

        return redirect()->route('salary-increments.index')->with('success', 'Salary increment updated.');
    }


}
