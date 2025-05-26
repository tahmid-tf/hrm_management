<?php

namespace App\Http\Controllers\PayrollAndSalaryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deduction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DeductionController extends Controller
{
    // Show all deductions
    public function index()
    {
        $deductions = Deduction::with('employee')->latest()->get();
        return view('panel.essential.payroll_and_salary_management.deductions.index', compact('deductions'));
    }

    // Show create form
    public function create()
    {
        $employees = User::role(['employee', 'manager'])->get(); // filter assignable roles
        return view('panel.essential.payroll_and_salary_management.deductions.create', compact('employees'));
    }

    // Store new deduction
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:users,id',
            'month' => 'required|date_format:Y-m',
            'type' => 'required|string|max:100',
            'amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
        ]);

        $validated['month'] = $validated['month'] . '-01'; // convert '2025-05' to full date
        $validated['added_by'] = Auth::id();

        Deduction::create($validated);

        return redirect()->route('deductions.index')->with('success', 'Deduction added successfully.');
    }

    // Delete a deduction
    public function destroy($id)
    {
        $deduction = Deduction::findOrFail($id);
        $deduction->delete();

        return back()->with('success', 'Deduction deleted successfully.');
    }
}
