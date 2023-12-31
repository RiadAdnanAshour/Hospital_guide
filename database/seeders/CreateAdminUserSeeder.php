<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the user with the given email already exists
        $existingUser = User::where('email', 'riadashour153@gmail.com')->first();

        if (!$existingUser) {
            // Create the user
            $user = User::create([
                'name' => 'riad',
                'username' => 'riad',
                'email' => 'riadashour153@gmail.com',
                'password' => bcrypt('12345678')
            ]);

            $role = Role::create(['name' => 'Admin']);

            $permissions = Permission::pluck('id')->all();

            $role->syncPermissions($permissions);

            $user->assignRole($role);
        }
    }
}
