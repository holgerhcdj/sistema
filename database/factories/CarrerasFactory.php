<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Carreras;
use Faker\Generator as Faker;

$factory->define(Carreras::class, function (Faker $faker) {

    return [
        'car_siglas' => $faker->word,
        'car_nombre' => $faker->word,
        'car_estado' => $faker->randomDigitNotNull
    ];
});
