<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:i:s");

        DB::table('permissions')->insert([
            'title' => 'Users management',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        factory(Permission::class, 9)->create();
    }
}
