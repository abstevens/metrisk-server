<?php

use \App\Models\Question;

$factory->define(Question::class, function (faker\Generator $faker){
    return [
        'question' => $faker->realText(100) . '?',
        'description' => $faker->text(),
    ];
});