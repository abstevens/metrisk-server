<?php

use Illuminate\Database\Seeder;
use \App\Models\Option;
use \App\Models\Question;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = Question::pluck('id');

        $questions->each(function ($question) {
            for ($i = 1; $i <= 5; $i++) {
                factory(Option::class)->create([
                    'question_id' => $question,
                    'order' => $i,
                    'author_id' => 1,
                ]);
            }
        });
    }
}
