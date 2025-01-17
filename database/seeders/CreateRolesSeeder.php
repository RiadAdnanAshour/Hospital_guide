<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // الأدوار التي تريد إنشاؤها
        $roles = ['Admin', 'User'];

        // الأذونات
        $permissions = Permission::pluck('id')->all();

        foreach ($roles as $roleName) {
            // إنشاء الدور إذا لم يكن موجودًا
            $role = Role::firstOrCreate(['name' => $roleName]);

            // ربط الأذونات بالدور
            $role->syncPermissions($permissions);
        }
    }
}
