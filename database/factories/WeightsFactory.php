<?php

use \App\Models\Weight;

$factory->define(Weight::class, function (faker\Generator $faker){
    return [
        'amount' => $faker->randomFloat(1, 0, 5),
    ];
});