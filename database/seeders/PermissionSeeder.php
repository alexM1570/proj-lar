<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([

            ['name'=>'edit-category', 'guard_name'=>'web'],
            ['name'=>'create-category', 'guard_name'=>'web'],
            ['name'=>'edit-groups', 'guard_name'=>'web'],
            ['name'=>'create-groups', 'guard_name'=>'web'],
            ['name'=>'create-users', 'guard_name'=>'web'],
            ['name'=>'edit-users', 'guard_name'=>'web'],
            ['name'=>'delete-groups', 'guard_name'=>'web'],
            ['name'=>'delete-users', 'guard_name'=>'web'],
            ['name'=>'delete-category', 'guard_name'=>'web'],
            ['name'=>'show-category', 'guard_name'=>'web'],
            ['name'=>'show-users', 'guard_name'=>'web'],
            ['name'=>'show-groups', 'guard_name'=>'web'],
            ['name'=>'show-stores', 'guard_name'=>'web'],
            ['name'=>'create-stores', 'guard_name'=>'web'],
            ['name'=>'edit-stores', 'guard_name'=>'web'],
            ['name'=>'delete-stores', 'guard_name'=>'web'],
            ['name'=>'create-roles', 'guard_name'=>'web'],
            ['name'=>'delete-roles', 'guard_name'=>'web'],
            ['name'=>'edit-roles', 'guard_name'=>'web'],
            ['name'=>'show-roles', 'guard_name'=>'web'],

        ]);

        $admin=Role::create(['name'=>'admin']);
        $moderator=Role::create(['name'=>'moderator']);
        $user=Role::create(['name'=>'user']);

       $admin->syncPermissions([
        'edit-category',
        'create-category',
        'edit-groups',
        'create-groups',
        'create-users',
        'edit-users',
        'delete-groups',
        'delete-users',
        'delete-category',
        'show-category',
        'show-users',
        'show-groups',
        'show-stores',
        'create-stores',
        'edit-stores',
        'delete-stores',
        'create-roles',
        'delete-roles',
        'edit-roles',
        'show-roles',

       ]);

       $moderator->syncPermissions([
        'edit-category',
        'create-category',
        'edit-groups',
        'create-groups',
        'delete-groups',
        'delete-category',
        'show-category',
        'show-users',
        'show-groups',
        'show-stores',
        'create-stores',
        'edit-stores',
        'delete-stores',
        'show-roles',

       ]);

       $user->syncPermissions([
        'show-groups',
        'show-stores',
        'show-stores',
              
       ]);

    }
}
