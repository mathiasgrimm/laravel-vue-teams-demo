<?php

use Faker\Generator as Faker;

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'first_name' => $faker->unique()->firstName,
        'last_name' => $faker->unique()->lastName,
        'team_id' => null
    ];
});
