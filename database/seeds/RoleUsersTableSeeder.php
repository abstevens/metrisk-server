<?php

use Illuminate\Database\Seeder;
use App\Models\RoleUser;
use \App\Models\User;
use \App\Models\Role;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id');
        $roles = Role::pluck('id');

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
