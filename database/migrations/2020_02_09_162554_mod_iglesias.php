<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModIglesias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iglesias',function(Blueprint $table){
            $table->string('nombre')->change();
            $table->bigInteger('pastor_id')->nullable()->change();
            $table->string('email')->change();
            $table->string('pais')->nullable()->change();
            $table->string('departamento')->nullable()->change();
            $table->string('municipio')->nullable()->change();
            $table->string('direccion')->nullable()->change();
            $table->string('telefono')->nullable()->change();
            $table->date('fecha_creacion')->nullable()->change();
            $table->integer('estado')->change();
            $table->string('iglesias_hijas')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
