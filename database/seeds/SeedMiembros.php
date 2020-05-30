<?php

use App\Models\Miembro;
use Illuminate\Database\Seeder;

class SeedMiembros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Miembro::class,3000)->create();
    }
}
