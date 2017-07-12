<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Permission;
use \Database\Traits\AdminRights;

class PermissionUsersTableSeeder extends Seeder
{
    use AdminRights;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = $this->getAdminId(User::class, 'email', 'testing@example.com');
        $permissionId = $this->getAdminId(Permission::class, 'title', 'Users management');

        DB::table('permission_users')->insert([
            'user_id' => $userId,
            'permission_id' => $permissionId,
        ]);

        $users = User::pluck('id');
        $permissions = Permission::pluck('id');

        $this->removeFirstAdminId($users, $userId);

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
