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
       // User::truncate();
        User::create([
         'nombre' => 'Suley',
         'apellido' => 'Caicedo Carabali',
         'rol' => 1,
         'logo' => 'logo.png',
         'email' => 'luz@iumec.org',
         'password' => bcrypt('iglesia123'),
         'remember_token' => Str::Random(10)
        ]);
    }
}
