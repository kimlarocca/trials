<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Trial;

$factory->define(Trial::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(),
        'ncit' => $faker->colorName,
        'title' => $faker->sentence
    ];
});
