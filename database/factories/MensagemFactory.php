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
$factory->define(App\Mensagem::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->firstName,
        'descricao' => $faker->text($max = 50),
        'contato_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
