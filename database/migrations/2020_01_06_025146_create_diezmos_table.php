<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiezmosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diezmos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('iglesias_id')->unsigned();
            $table->bigInteger('miembros_id')->unsigned();

            $table->string('fecha',20);
            $table->string('valor',10);

            $table->foreign('iglesias_id')->references('id')->on('iglesias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('miembros_id')->references('id')->on('miembros')
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
        Schema::dropIfExists('diezmos');
    }
}
