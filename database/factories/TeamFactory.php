<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->words(mt_rand(1, 4), true)
    ];
});