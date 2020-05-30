<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('iglesias_id')->unsigned();
            $table->integer('identificacion')->unsigned();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('ciudad');
            $table->string('email')->nullable();
            $table->string('telefono');
            $table->string('direccion');
            $table->boolean('estado')->default(true);
            $table->integer('tipo_contrato');
            $table->date('fecha_ingreso');
            $table->date('fecha_final')->nullable();
            $table->string('jefe');
            $table->date('fecha_retiro')->nullable();
            $table->integer('periodo_pago');
            $table->string('salario',10);
            $table->string('soporte');
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
        Schema::dropIfExists('empleados');
    }
}
