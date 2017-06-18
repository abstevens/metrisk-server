<?php

use Illuminate\Database\Seeder;
use App\User;
use \Backpack\PermissionManager\app\Models\Role as Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$userAdmin = User::create(['name' => 'Test', 'email' => '', 'password']);
        //
        //$roleAdmin = Role::create(['name' => 'Admin', 'users' => ]);

        $this->call(QuestionsTableSeeder::class);
    }
}
