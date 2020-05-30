<?php

use App\Models\Iglesia;
use Illuminate\Database\Seeder;

class Iglesias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Iglesia::class,300)->create();
    }
}
