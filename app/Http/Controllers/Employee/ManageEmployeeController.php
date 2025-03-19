<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class ManageEmployeeController extends Controller
{
    // Get All Employees
    public function index()
    {
        return response()->json(Employee::all(), 200);
    }

    // Create a New Employee
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:employees',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees',

            'phone' => 'required',
            'address' => 'required',

            'designation' => 'required',
            'department' => 'required',
            'joining_date' => 'required|date',
        ]);

        $employee = Employee::create($request->all());

        return response()->json($employee, 201);
    }

    // Get Single Employee
    public function show($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json($employee, 200);
    }

    // Update Employee Details
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        // Validation Rules
        $request->validate([
            'employee_id' => 'required|unique:employees,employee_id,' . $employee->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|digits_between:10,15',
            'address' => 'nullable|string|max:255',
            'designation' => 'required',
            'department' => 'required',
            'joining_date' => 'required|date',
            'status' => 'required|in:active,inactive,terminated',
        ]);

        $employee->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Employee updated successfully',
            'data' => $employee
        ], 200);
    }

    // Delete Employee
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }
}
