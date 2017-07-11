<?php

use \App\Models\Role;

$factory->define(Role::class, function (faker\Generator $faker){
    return [
        'title' => $faker->unique()->jobTitle,
    ];
});