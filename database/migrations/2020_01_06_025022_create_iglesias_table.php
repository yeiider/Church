<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIglesiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iglesias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('distritos_id')->unsigned();
            $table->string('nombre',30);
            $table->bigInteger('pastor_id')->nullable();
            $table->string('email',30)->unique();
            $table->string('pais',10)->nullable();
            $table->string('departamento',20)->nullable();
            $table->string('municipio',20)->nullable();
            $table->string('direccion',30)->nullable();
            $table->string('telefono',30)->nullable();
            $table->date('fecha_creacion',30)->nullable();
            $table->integer('estado');
            $table->string('iglesias_hijas',30)->nullable();
            $table->string('logo')->nullable();
            $table->string('referencia')->nullable();
            $table->timestamps();

            $table->foreign('distritos_id')->references('id')->on('distritos')
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
        Schema::dropIfExists('iglesias');
    }
}
