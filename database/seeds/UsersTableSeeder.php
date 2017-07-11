<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:i:s");

        DB::table('users')->insert([
            'name' => 'Testing example',
            'email' => 'testing@example.com',
            'password' => bcrypt('testing'),
            'remember_token' => str_random(10),
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        factory(User::class, 50)->create();
    }
}
