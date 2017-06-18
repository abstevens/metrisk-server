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
        for($i = 1; $i <= 20; $i++) {
            factory(Question::class)->create([
                'order' => $i,
            ]);
        }
    }
}
