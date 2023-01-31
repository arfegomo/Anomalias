<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Areasgrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areasgrupos', function (Blueprint $table) {
            $table->integer('idgrupo')->unsigned(); 
            $table->integer('idarea')->unsigned(); 
            $table->timestamps();

            $table->foreign('idgrupo')
                ->references('id')->on('gruposproductos')
                    ->onDelete('cascade');
                    
            $table->foreign('idarea')
                ->references('id')->on('areas')
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
        Schema::dropIfExists('areasgrupos');
    }
}
