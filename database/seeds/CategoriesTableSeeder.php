<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \Database\Traits\AdminRights;

class CategoriesTableSeeder extends Seeder
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

        $date = date("Y-m-d H:i:s");

        DB::table('categories')->insert([
            'title' => 'Risk',
            'author_id' => $userId,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
