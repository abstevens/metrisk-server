<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Permission;

class PermissionUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id');
        $permissions = Permission::pluck('id');

        $users->each(function ($user, $key) use ($permissions) {
            $halfPermissionsCount = $permissions->count() / 2;
            $randomPermissionsAmount = mt_rand(1, $halfPermissionsCount);
            $permissionRoles = $permissions->random($randomPermissionsAmount);

            $permissionRoles->each(function ($permission) use ($user) {
                DB::table('permission_users')->insert(
                    [
                        'user_id' => $user,
                        'permission_id' => $permission,
                    ]
                );
            });
        });
    }
}
