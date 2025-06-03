<?php

namespace Database\Seeders;

use App\Models\AttendanceGraceTime;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        1. Creating a user first
        2. Creating all necessary roles
        3. Creating all necessary permissions
        4. Assigning role to user
        5. Assigning permission to user
        6. Attendance grace time creation
         */

        $this->create_user_roles_permission_and_assign_roles_and_permissions();
    }

    public function create_user_roles_permission_and_assign_roles_and_permissions(): void
    {
        $user = User::create([
            'name' => 'Tahmid Ferdous',
            'email' => 'tahmid.tf1@gmail.com',
            'password' => Hash::make('123456789'),
        ]);


        // employee data creation

        Employee::create([
            'user_id' => $user->id,
            'employee_id' => $user->id,
            'phone' => '01828665566',
            'date_of_birth' => '1995-05-15',
            'gender' => 'male',
            'designation' => 'Software Engineer',
            'department' => 'IT',
            'joining_date' => '2024-01-01',
            'salary' => 50000,
            'address' => '123, Dhaka, Bangladesh',
            'status' => 'active',
            'image' => 'images/default.png', // adjust if you have a default image
        ]);


        // role creation

        $roles = ['admin', 'hr', 'manager', 'employee', 'hold'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // permission creation

        Permission::create([
            'name' => 'access_all',
        ]);

        // assigning role and permission to user

        $user->assignRole('admin');
        $user->givePermissionTo('access_all');

        // attendance grace time creation

        AttendanceGraceTime::create([
            'key' => 'attendance_grace_time',
            'value' => '10:00:00',
        ]);

    }
}
