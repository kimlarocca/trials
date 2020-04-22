<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Patient;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'alternate_name' => $faker->name,
        'age' => $faker->numberBetween(18, 99),
        'gender' => $faker->randomElement($array = array ('male', 'female')),
        'smoker' => $faker->boolean,
        'zip' => $faker->numberBetween(11111,99999),
        'travel_distance' => $faker->colorName,
        'underlying_conditions' => $faker->sentence,
    ];
});
