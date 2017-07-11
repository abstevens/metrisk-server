<?php

use Illuminate\Database\Seeder;
use \App\Models\Question;
use App\Models\User;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <=20; $i++) {
            factory(Question::class)->create([
                'order' => $i,
                'author_id' => 1,
            ]);
        }
    }
}
