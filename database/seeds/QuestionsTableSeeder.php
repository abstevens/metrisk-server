<?php

use Illuminate\Database\Seeder;
use \App\Models\Question;
use \App\Models\QuestionClass;
use \App\Models\User;
use \Database\Traits\AdminRights;

class QuestionsTableSeeder extends Seeder
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

        $classes = QuestionClass::pluck('id');

        for ($i = 1; $i <= 20; $i++) {
            $class = $classes->random();
            factory(Question::class)->create([
                'order' => $i,
                'class_id' => $class,
                'author_id' => $userId,
            ]);
        }
    }
}
