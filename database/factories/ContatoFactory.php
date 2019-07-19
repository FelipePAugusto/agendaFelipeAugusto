<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Contato::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->firstName,
        'sobrenome' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->tollFreePhoneNumber,
        'imagem' => $faker->imageUrl(60,60)
    ];
});
