<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min= 8 ,$max = 12),
        'to_user_id' => $faker->numberBetween($min= 8 ,$max = 12),
        'body' => $faker->text($maxNBChars=150),
    ];
});
