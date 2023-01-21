<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cursos;
use Faker\Generator as Faker;

$factory->define(Cursos::class, function (Faker $faker) {

    return [
        'cur_siglas' => $faker->word,
        'cur_descripcion' => $faker->word,
        'cur_numero' => $faker->randomDigitNotNull
    ];
});
