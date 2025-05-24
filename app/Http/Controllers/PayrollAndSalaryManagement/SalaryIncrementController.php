<?php

namespace App\Http\Controllers\PayrollAndSalaryManagement;

use App\Http\Controllers\Controller;
use App\Models\SalaryIncrement;
use Illuminate\Http\Request;

class SalaryIncrementController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:users,id',
            'increment_amount' => 'required|numeric',
            'effective_date' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        $validated['added_by'] = auth()->id();

        SalaryIncrement::create($validated);

        return back()->with('success', 'Salary increment added.');
    }
}
