<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('iglesias_id')->unsigned();
            $table->bigInteger('empleados_id')->unsigned();
            $table->string('codigo')->uniqid();
            $table->string('dias',10);
            $table->string('basico',10);
            $table->string('aux_transporte',10);
            $table->string('total_devengado',10);
            $table->string('salud',7);
            $table->string('pension',7);
            $table->string('total_deducciones',10);
            $table->string('neto',10);
            $table->text('nota')->nullable();
            $table->string('aprobado')->nullable();
            $table->string('elaborado');
            $table->string('contabilizado')->nullable();
            $table->foreign('empleados_id')->references('id')->on('empleados')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('nomina');
    }
}
