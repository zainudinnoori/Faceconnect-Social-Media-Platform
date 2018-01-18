<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'photo'=> $faker->image('public/images',100,100, null, false),
        'user_id' => $faker->numberBetween($min= 93 ,$max = 93),
        'post_id' => $faker->numberBetween($min= 158 ,$max = 158),
    ];
});
