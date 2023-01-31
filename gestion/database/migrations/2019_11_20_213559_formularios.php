<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Formularios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('idproducto')->unsigned(); 
            $table->integer('idproveedor')->unsigned(); 
            $table->integer('idtienda')->unsigned();
            $table->text('observacion');
            $table->string('promotora');
            $table->string('lote');
            $table->date('fechavencimiento');
            $table->integer('momento');
            $table->timestamps();

            $table->foreign('idtienda')
                ->references('id')->on('tiendas')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('formularios');
    }
}
