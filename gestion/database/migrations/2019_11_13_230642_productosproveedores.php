<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productosproveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productosproveedores', function (Blueprint $table) {
            $table->integer('idproveedor')->unsigned(); 
            $table->integer('idproducto')->unsigned(); 
            $table->timestamps();

            $table->foreign('idproveedor')
                ->references('id')->on('proveedores')
                    ->onDelete('cascade');
                    
            $table->foreign('idproducto')
                ->references('id')->on('productos')
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
        Schema::dropIfExists('productosproveedores');
    }
}
