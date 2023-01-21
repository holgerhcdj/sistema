<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Horarios;
use Faker\Generator as Faker;

$factory->define(Horarios::class, function (Faker $faker) {

    return [
        'asc_id' => $faker->word,
        'cur_id' => $faker->word,
        'mat_id' => $faker->word,
        'usu_id' => $faker->word,
        'hor_dia' => $faker->randomDigitNotNull,
        'hor_hora' => $faker->randomDigitNotNull,
        'hor_paralelo' => $faker->randomDigitNotNull
    ];
});
