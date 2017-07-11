<?php

use Illuminate\Database\Seeder;
use \App\Models\QuestionClass;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            factory(QuestionClass::class)->create([
                'order' => $i,
                'author_id' => 1,
            ]);
        }
    }
}
