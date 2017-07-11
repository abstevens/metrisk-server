<?php

use Illuminate\Database\Seeder;
use \App\Models\Option;
use \App\Models\Weight;

class WeightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = Option::pluck('id');

        $options->each(function ($option) {
            factory(Weight::class)->create([
                'option_id' => $option,
                'category_id' => 1,
                'author_id' => 1,
            ]);
        });
    }
}
