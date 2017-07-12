<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Role;
use \Database\Traits\AdminRights;

class RoleUsersTableSeeder extends Seeder
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
        $roleId = $this->getAdminId(Role::class, 'title', 'Admin');

        DB::table('role_users')->insert([
            'role_id' => $roleId,
            'user_id' => $userId,
        ]);

        $users = User::pluck('id');
        $roles = Role::pluck('id');

        $this->removeFirstAdminId($users, $userId);

        $users->each(function ($user, $key) use ($roles) {
            $randomRoles = $roles->random(3)->all();
            $randomRolesKeys = array_keys($randomRoles);
            $chance = mt_rand(0, 9);

            if ($chance <= 6) {
                $insertCount = 1;
            } elseif ($chance <= 8) {
                $insertCount = 2;
            } else {
                $insertCount = 3;
            }

            for ($i = 0; $i < $insertCount; $i++) {
                $roleIndex = $randomRolesKeys[$i];

                DB::table('role_users')->insert(
                    [
                        'user_id' => $user,
                        'role_id' => $randomRoles[$roleIndex],
                    ]
                );
            }
        });
    }
}
