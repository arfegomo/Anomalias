<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Anomaliasgruposproductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anomaliasgruposproductos', function (Blueprint $table) {
            $table->integer('idgruposproductos')->unsigned(); 
            $table->integer('idanomalias')->unsigned(); 
            $table->timestamps();

            $table->foreign('idgruposproductos')
                ->references('id')->on('gruposproductos')
                    ->onDelete('cascade');
                    
            $table->foreign('idanomalias')
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
        Schema::dropIfExists('anomaliasgruposproductos');
    }
}
