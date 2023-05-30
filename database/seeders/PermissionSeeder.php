<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin permissions
        Permission::create(['name' => 'users']);
        Permission::create(['name' => 'my offers']);
        Permission::create(['name' => 'apply']);

        $adminRole = Role::where('name', 'Admin')->first();
        $adminRole->givePermissionTo([
            'users',
        ]);

        $adminRole = Role::where('name', 'Recruiter')->first();
        $adminRole->givePermissionTo([
            'my offers',
        ]);

        $adminRole = Role::where('name', 'Candidate')->first();
        $adminRole->givePermissionTo([
            'apply',
        ]);
    }
}
