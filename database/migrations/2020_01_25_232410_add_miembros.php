<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\FuncCall;

class AddMiembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembros',function(Blueprint $table){
           $table->string('telefono')->nullable();
           $table->string('direccion')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miembros',function(Blueprint $table){
          $table->dropColumn('telefono');
          $table->dropColumn('direccion');
        });
    }
}
