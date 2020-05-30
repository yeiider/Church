<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Miembro;
use Faker\Generator as Faker;

$factory->define(Miembro::class, function (Faker $faker) {

    $etnia=array('Afro','Indio','Mulato','Mestizo','Blanco');
    return [
               'iglesias_id' => rand(1,300),
                'nombres' => ucwords(trim($faker->name)),
                'apellidos' => ucwords(trim($faker->name)),
                'identificacion' => rand(1111111111,9999999999),
                'genero' => rand(1,2),
                'edad' => rand(6,40),
                'fecha_nacimiento'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                'estado_civil' => rand(1,3),
                 'etnia' => array_rand($etnia,1),
                 'diezma' => rand(0,1),
                 'estado_civil' => rand(1,3),
                 'num_hijos' => rand(0,7),
                 'email' => $faker->email,
                 'direccion' => $faker->address,
                 'estado' => rand(0,1),


                 'fecha_inicio'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                 'departamento' => $faker->cityPrefix,
                 'municipio' => $faker->cityPrefix,


                 'empleado' => rand(0,1),
                 'estrato' => rand(1,7),
                 'discapasida'=> rand(0,1)
    ];
});
