<?php

use Illuminate\Database\Seeder;
use \App\Models\Role;
use \App\Models\Permission;

class PermissionRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_roles')->insert([
            'role_id' => 1,
            'permission_id' => 1,
        ]);

        $roles = Role::pluck('id');
        $permissions = Permission::pluck('id');

        $firstRole = $roles->search(1);
        unset($roles[$firstRole]);

        $roles->each(function ($role, $key) use ($permissions) {
            $halfPermissionsCount = $permissions->count() / 2;
            $randomPermissionsAmount = mt_rand(1, $halfPermissionsCount);
            $permissionRoles = $permissions->random($randomPermissionsAmount);

            $permissionRoles->each(function ($permission) use ($role) {
                DB::table('permission_roles')->insert(
                    [
                        'role_id' => $role,
                        'permission_id' => $permission,
                    ]
                );
            });
        });
    }
}
