<?php

use Illuminate\Database\Seeder;
use App\User;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
         'nombre' => 'Yeider Adrian',
         'apellido' => 'Mina Caicedo',
         'rol' => 1,
         'logo' => 'logo.png',
         'email' => 'yeider@iumec.org',
         'password' => bcrypt('yeider9512'),
         'remember_token' => Str::Random(10)
        ]);
    }
}
