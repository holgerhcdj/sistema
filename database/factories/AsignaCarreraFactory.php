<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AsignaCarrera;
use Faker\Generator as Faker;

$factory->define(AsignaCarrera::class, function (Faker $faker) {

    return [
        'usu_id' => $faker->word,
        'car_id' => $faker->word,
        'asc_fecha' => $faker->word,
        'asc_observaciones' => $faker->word
    ];
});
