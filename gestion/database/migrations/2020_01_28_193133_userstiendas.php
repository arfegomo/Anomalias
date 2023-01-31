<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Userstiendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userstiendas', function (Blueprint $table) {
            
            $table->integer('iduser')->unsigned(); 
            $table->integer('idtienda')->unsigned();

            $table->foreign('iduser')
                ->references('id')->on('users')
                    ->onDelete('cascade');

            $table->foreign('idtienda')
                ->references('id')->on('tiendas')
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
        Schema::dropIfExists('userstiendas');
    }
}
