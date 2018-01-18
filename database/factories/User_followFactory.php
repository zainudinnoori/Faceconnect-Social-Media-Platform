<?php

use Faker\Generator as Faker;

$factory->define(App\User_follow::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min= 1 ,$max = 100),
        'follow_id' => $faker->numberBetween($min= 1 ,$max = 100),
    ];
});
