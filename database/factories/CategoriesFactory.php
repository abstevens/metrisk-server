<?php

use \App\Models\Category;

$factory->define(Category::class, function (faker\Generator $faker){
    return [
        'title' => $faker->realText(20),
    ];
});