<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Materias;
use Faker\Generator as Faker;

$factory->define(Materias::class, function (Faker $faker) {

    return [
        'mat_descripcion' => $faker->word,
        'mat_area' => $faker->word,
        'mat_estado' => $faker->randomDigitNotNull
    ];
});
