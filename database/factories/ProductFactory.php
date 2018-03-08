<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'stock' => $faker->numberBetween(0, 100),
        'price' => $faker->numberBetween(0, 1000000)
    ];
});
