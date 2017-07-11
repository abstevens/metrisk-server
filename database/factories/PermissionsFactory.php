<?php

use \App\Models\Permission;

$factory->define(Permission::class, function (faker\Generator $faker){
    return [
        'title' => $faker->unique()->catchPhrase,
    ];
});