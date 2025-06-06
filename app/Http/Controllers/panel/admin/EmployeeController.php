<?php

namespace App\Http\Controllers\panel\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->get();

        if (auth()->user()->hasRole('hr')) {
            return view('panel.hr.employee.view', compact('employees'));
        }

        if (auth()->user()->hasRole('manager')) {
            return view('panel.manager.employee.view', compact('employees'));
        }

        return view('panel.admin.employee.view', compact('employees'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.admin.employee.create_employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'nullable|string|max:20|unique:employees',
            'date_of_birth' => 'nullable|date|before:today',
            'gender' => 'nullable|in:male,female,other',
            'designation' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'joining_date' => 'nullable|date',
            'salary' => 'nullable|numeric|min:0',
            'address' => 'nullable|string|max:1000',
            'status' => 'required|in:active,inactive',
            'image' => 'required',
            'role' => 'required|in:admin,hr,manager,employee',
        ]);


//   ----------------------------- validation checkup -----------------------------

        if (User::where('email', $input['email'])->exists()) {
            session()->flash('error', 'Email already exists');
            return back();
        }

//   ---------------------------- User Creation ----------------------------

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

//  ----------------------------- Employee Creation -----------------------------

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $input['image'] = $request->file('image')->store('images', 'public');
        }

        Employee::create([
            'user_id' => $user->id,
            'employee_id' => $user->id,
            'phone' => $input['phone'],
            'date_of_birth' => $input['date_of_birth'],
            'gender' => $input['gender'],
            'designation' => $input['designation'],
            'department' => $input['department'],
            'joining_date' => $input['joining_date'],
            'salary' => $input['salary'],
            'address' => $input['address'],
            'status' => $input['status'],
            'image' => $input['image'],
        ]);

        // ---------------------- role setup based on input

        $user->assignRole($input['role']);

        session()->flash('success', 'Employee added successfully');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $employee = Employee::find($id);

        if (!$employee) {
            return "Employee not found";
        }

        return view('panel.admin.employee.view_single_employee', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

//        $user = User::where('user_id', $employee->id)->first();
        if (auth()->user()->hasRole('hr')) {
            return view('panel.hr.employee.edit_employee', compact('employee'));
        }


        return view('panel.admin.employee.edit_employee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // only admin and hr can edit employees.
        if (!auth()->user()->hasAnyRole(['admin', 'hr'])) {
            return back()->with('error', 'Only admin and HR can edit employees.');
        };

        $employee = Employee::findOrFail($id);
        $user = $employee->user;

        $input = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20|unique:employees,phone,' . $employee->id,
            'date_of_birth' => 'nullable|date|before:today',
            'gender' => 'nullable|in:male,female,other',
            'designation' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'joining_date' => 'nullable|date',
            'salary' => 'nullable|numeric|min:0',
            'address' => 'nullable|string|max:1000',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required|in:admin,hr,manager,employee,hold',
        ]);


        // Update user
        $user->update([
            'name' => $input['name'],
            'email' => $input['email'],
        ]);

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $input['image'] = $request->file('image')->store('images', 'public');
        } else {
            $input['image'] = $employee->image;
        }


        // Update employee
        $employee->update([
            'phone' => $input['phone'],
            'date_of_birth' => $input['date_of_birth'],
            'gender' => $input['gender'],
            'designation' => $input['designation'],
            'department' => $input['department'],
            'joining_date' => $input['joining_date'],
            'salary' => $input['salary'],
            'address' => $input['address'],
            'status' => $input['status'],
            'image' => $input['image'],
        ]);

        // Sync role
        $user->syncRoles($input['role']);

        return back()->with('success', 'Employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        // admin cannot remove himself/herself from the system.
        if (auth()->id() == $id) {
            return back()->with('success', 'Admin cannot remove himself/herself from the system.');
        }

        // only admin can delete employees.
        if (!auth()->user()->hasRole('admin')) {
            return back()->with('success', 'Only admin can delete employees.');
        }

        $employee = Employee::find($id);

        if (!$employee) {
            return "Employee not found";
        }

        $user = User::find($employee->user_id);

        if (!$user) {
            return "User not found";
        }

        $user->delete();
        $employee->delete();

        return back()->with('success', 'Employee deleted successfully');
    }

    // -------------------------------------------------- hold account functionalities --------------------------------------------------

    public function hold_account_index()
    {
        $employees = Employee::orderBy('id', 'desc')->get();

        return view('panel.admin.employee.hold_account', compact('employees'));
    }

    public function hold_account_store($id)
    {
        // admin cannot remove himself/herself from the system.
        if (auth()->id() == $id) {
            return back()->with('error', 'Admin cannot hold himself/herself from the system.');
        }

        // only admin can delete employees.
        if (!auth()->user()->hasRole('admin')) {
            return back()->with('error', 'Only admin can delete employees.');
        }

        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        // Sync role
        $user->syncRoles("hold");
        return back()->with('success', `${$user->name}'s account on hold successfully`);
    }
}
