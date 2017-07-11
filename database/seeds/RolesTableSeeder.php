<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:i:s");

        DB::table('roles')->insert([
            'title' => 'Admin',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        factory(Role::class, 4)->create();
    }
}
