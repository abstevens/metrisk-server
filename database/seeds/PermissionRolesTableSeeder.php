<?php

use Illuminate\Database\Seeder;
use \App\Models\Role;
use \App\Models\Permission;
use \Database\Traits\AdminRights;

class PermissionRolesTableSeeder extends Seeder
{
    use AdminRights;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleId = $this->getAdminId(Role::class, 'title', 'Admin');
        $permissionId = $this->getAdminId(Permission::class, 'title', 'Users management');

        DB::table('permission_roles')->insert([
            'role_id' => $roleId,
            'permission_id' => $permissionId,
        ]);

        $roles = Role::pluck('id');
        $permissions = Permission::pluck('id');

        $this->removeFirstAdminId($roles, $roleId);

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
