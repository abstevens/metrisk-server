<?php

use Illuminate\Database\Seeder;
use \App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = \App\Models\QuestionClass::pluck('id');

        for ($i = 1; $i <= 20; $i++) {
            $class = $classes->random();
            factory(Question::class)->create([
                'order' => $i,
                'class_id' => $class,
                'author_id' => 1,
            ]);
        }
    }
}
