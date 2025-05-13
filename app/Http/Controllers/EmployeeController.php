<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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

//            'employee_id' => 'required|string|unique:employees,employee_id',
            'phone' => 'nullable|string|max:20',
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

        if (User::where('email',$input['email'])->exists()) {
            session()->flash('error','Email already exists');
            return back();
        }

//   ---------------------------- User Creation ----------------------------

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

//  ----------------------------- Employee Creation -----------------------------

        if ($request->hasFile('image')) {
            $input['image'] = \request('image')->store('images', 'public');
        }

    Employee::created([
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
        'role' => $input['role'],
        'image' => $input['image'],
    ]);

        // ---------------------- role setup based on input

        $user->assignRole($input['role']);

        session()->flash('success','Employee added successfully');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
