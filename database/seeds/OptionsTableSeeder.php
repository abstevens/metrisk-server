<?php

use Illuminate\Database\Seeder;
use \App\Models\Option;
use \App\Models\Question;
use \Database\Traits\AdminRights;

class OptionsTableSeeder extends Seeder
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

        $questions = Question::pluck('id');

        $questions->each(function ($question) use ($userId) {
            for ($i = 1; $i <= 5; $i++) {
                factory(Option::class)->create([
                    'question_id' => $question,
                    'order' => $i,
                    'author_id' => $userId,
                ]);
            }
        });
    }
}
