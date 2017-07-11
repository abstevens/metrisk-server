<?php

use \App\Models\Option;

$factory->define(Option::class, function (faker\Generator $faker){
    return [
        'title' => $faker->realText(20),
    ];
});