<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        // role creation

        $roles = ['admin', 'hr', 'manager'];

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
    }
}
