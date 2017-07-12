<?php

use Illuminate\Database\Seeder;
use \App\Models\QuestionClass;
use \App\Models\User;
use \Database\Traits\AdminRights;

class ClassesTableSeeder extends Seeder
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

        for ($i = 1; $i <= 5; $i++) {
            factory(QuestionClass::class)->create([
                'order' => $i,
                'author_id' => $userId,
            ]);
        }
    }
}
