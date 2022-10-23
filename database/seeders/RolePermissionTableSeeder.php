<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create(['name' => 'SuperAdmin']);
        $admin      = Role::create(['name' => 'Admin']);
        $editor     = Role::create(['name' => 'Editor']);
        $user       = Role::create(['name' => 'User']);

        $permissions = [
            // Dashboard group
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],

            // Admin Group
            [
                'group_name' => 'admin',
                'permissions' =>[
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                ]
            ],

            // Blog Group
            [
                'group_name' => 'blog',
                'permissions' =>[
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],

            // Role Group
            [
                'group_name' => 'role',
                'permissions' =>[
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],

            // Profile group
            [
                'group_name' => 'profile',
                'permissions' =>[
                    'profile.view',
                    'profile.edit',
                ]
            ],
         
        ];


        for($i=0; $i<count($permissions); $i++)
        {
            for($j=0; $j<count($permissions[$i]['permissions']); $j++){
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name'=> $permissions[$i]['group_name']
                ]);
                $superAdmin->givePermissionTo($permission);
            }
         
        }
        
       

    }
}
