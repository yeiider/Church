<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('iglesias_id')->unsigned();
            $table->string('publico');
            $table->string('tipo');
            $table->string('titulo')->nullable();
            $table->string('lema')->nullable();
            $table->string('valor',20)->nullable();
            $table->string('lugar')->nullable();
            $table->string('direccion')->nullable();
            $table->string('invita')->nullable();
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('hora_inicio')->nullable();
            $table->string('hora_final')->nullable();
            $table->string('color',20)->nullable();
            $table->string('archivo',60)->nullable();
            $table->timestamps();

            $table->foreign('iglesias_id')->references('id')->on('iglesias')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
