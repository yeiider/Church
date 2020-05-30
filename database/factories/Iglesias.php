<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Iglesia;
use Faker\Generator as Faker;

$factory->define(Iglesia::class, function (Faker $faker) {
    $ref=$faker->name;
    return [
        'distritos_id' => rand(1,5),
        'nombre' => $ref,
        'email' => $faker->unique()->email,
        'pais' => $faker->stateAbbr,
        'departamento' => $faker->cityPrefix,
        'municipio' => $faker->cityPrefix,
        'direccion' => $faker->secondaryAddress,
        'telefono' => $faker->tollFreePhoneNumber,
        'estado' => 1,
        'logo' => 'logo.png',
        'pastor_id' => 1,
        'referencia' => str_replace(' ','-',$ref)
    ];
});
