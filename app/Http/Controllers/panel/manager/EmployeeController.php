<?php

namespace App\Http\Controllers\panel\manager;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('panel.manager.employee.view', compact('employees'));
    }

    public function show($id){
        $employee = Employee::find($id);

        if (!$employee) {
            return "Employee not found";
        }

        return view('panel.admin.employee.view_single_employee', compact('employee'));
    }
}
