<?php

use \App\Models\User;

$factory->define(User::class, function (faker\Generator $faker){
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});