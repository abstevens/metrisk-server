<?php

use Illuminate\Database\Seeder;
use \App\Models\Question;
use \App\Models\User;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $questions = Question::with('options')->get()->toArray();
//        $users = User::pluck('id');
//
//        $users->each(function ($user) use ($questions) {
//            $date = date("Y-m-d H:i:s");
//
//            foreach ($questions as $question) {
//                $randomOption = rand(0, 4);
//                $answer = $question['options'][$randomOption]['id'];
//                DB::table('answers')->insert([
//                    'user_id' => $user,
//                    'option_id' => $answer,
//                    'created_at' => $date,
//                    'updated_at' => $date,
//                ]);
//            }
//        });
        $questions = Question::with('options')->get();
        $users = User::pluck('id');

        $users->each(function ($user) use ($questions) {
            $questions->each(function ($question) use ($user) {
                $date = date("Y-m-d H:i:s");
                $randomOption = rand(0, 4);
                $answer = $question->options[$randomOption]->id;
                DB::table('answers')->insert([
                    'user_id' => $user,
                    'option_id' => $answer,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            });
        });
    }
}
