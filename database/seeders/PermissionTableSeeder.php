<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'role-show',
            'role-create',
            'role-edit',
            'role-delete',
            'user-show',
            'user-create',
            'user-edit',
            'user-delete',
            'client-show',
            'client-create',
            'client-edit',
            'client-delete',
            'receive-show',
            'receive-create',
            'receive-edit',
            'receive-delete',
            'cashOut-show',
            'cashOut-create',
            'cashOut-edit',
            'cashOut-delete',
            'material-show',
            'material-create',
            'material-edit',
            'material-delete',
            'supplier-show',
            'supplier-create',
            'supplier-edit',
            'supplier-delete',

         ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
