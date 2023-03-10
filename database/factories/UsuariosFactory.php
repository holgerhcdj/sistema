<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Usuarios;
use Faker\Generator as Faker;

$factory->define(Usuarios::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'cedula' => $faker->word,
        'phone' => $faker->word,
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'password' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'perfil' => $faker->randomDigitNotNull,
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
