<?php

use \App\Models\QuestionClass;

$factory->define(QuestionClass::class, function (faker\Generator $faker){
    return [
        'title' => $faker->realText(20),
    ];
});