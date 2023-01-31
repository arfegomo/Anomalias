<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GruposproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gruposproductos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('idtipogrupo')->unsigned();
            $table->timestamps();

            $table->foreign('idtipogrupo')
                ->references('id')->on('tiposgrupos')
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
        Schema::dropIfExists('gruposproductos');
    }
}
