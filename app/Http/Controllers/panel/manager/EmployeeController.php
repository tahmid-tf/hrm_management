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
}
