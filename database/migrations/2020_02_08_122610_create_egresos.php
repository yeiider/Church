<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('iglesias_id')->unsigned();
            $table->bigInteger('cuentas_id')->unsigned();
            $table->string('valor',25);
            $table->boolean('estado')->default(true);
            $table->string('file',30)->nullable();
            $table->foreign('iglesias_id')->references('id')->on('iglesias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('cuentas_id')->references('id')->on('cuentas')
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
        Schema::dropIfExists('egresos');
    }
}
