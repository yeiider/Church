<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',20);
            $table->string('apellido',20);
            $table->string('identificacion',12);
            $table->string('genero',7);
            $table->string('edad',2)->nullable();
            $table->string('fecha_nacimiento',20)->nullable();
            $table->string('etnia',10)->nullable();
            $table->boolean('casado')->nullable();
            $table->string('num_hijos',2)->nullable();
            $table->string('email')->unique();
            $table->string('direccion')->nullable();
            $table->string('pais',20)->nullable();
            $table->string('departamento',20)->nullable();
            $table->string('municipio',20)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('logo',20)->nullable();
            $table->string('cargo')->nullable();
            $table->string('arl',40)->nullable();
            $table->string('afp',40)->nullable();
            $table->string('eps',40)->nullable();
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
        Schema::dropIfExists('pastors');
    }
}
