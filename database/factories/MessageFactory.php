<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min= 1 ,$max = 100),
        'to_user_id' => $faker->numberBetween($min= 1 ,$max = 100),
        'body' => $faker->text($maxNBChars=10),
    ];
});
