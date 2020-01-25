<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('iglesias_id')->unsigned();
            $table->string('nombres',20);
            $table->string('apellidos',20);
            $table->string('identificacion',20)->nullable();
            $table->string('genero',10);
            $table->string('edad',2)->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('num_hijos',2)->nullable();
            $table->boolean('diezma');
            $table->string('estado',10)->nullable();
            $table->string('fecha_inicio',20)->nullable();
            $table->boolean('empleado');
            $table->integer('estrato');
            $table->string('etnia')->nullable();
            $table->boolean('discapasida');
            $table->string('email')->nullable();
            $table->string('pais',20)->nullable();
            $table->string('departamento',20)->nullable();
            $table->string('municipio',20)->nullable();
            $table->foreign('iglesias_id')->references('id')->on('iglesias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miembros');
    }
}
