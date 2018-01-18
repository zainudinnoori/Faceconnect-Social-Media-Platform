<?php

use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
   	 return [
        'user_id' => $faker->numberBetween($min= 1 ,$max = 100),
        'post_id' => $faker->numberBetween($min= 1 ,$max = 500),
    ];
});
