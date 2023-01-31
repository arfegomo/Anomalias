<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detallesanomalias extends Migration
{

    public function up()
    {
        Schema::create('detallesanomalias', function (Blueprint $table) {
            $table->integer('idformulario')->unsigned(); 
            $table->integer('idanomalia')->unsigned();

            $table->foreign('idformulario')
                ->references('id')->on('formularios')
                    ->onDelete('cascade');

            $table->foreign('idanomalia')
                ->references('id')->on('anomalias')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallesanomalias');
    }
}
