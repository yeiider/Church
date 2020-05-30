<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModIMiembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembros',function(Blueprint $table){
            $table->string('nombres')->change();
            $table->string('apellidos')->change();
            $table->string('identificacion')->nullable()->change();
            $table->string('genero')->change();
            $table->string('pais')->nullable()->change();
            $table->string('departamento')->nullable()->change();
            $table->string('municipio')->nullable()->change();
            $table->string('estado')->nullable()->change();
            $table->date('fecha_inicio')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
