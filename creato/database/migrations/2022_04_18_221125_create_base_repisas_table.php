<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('base_repisas', function (Blueprint $table) {
            $table->id();    
            $table->unsignedBigInteger('ficha_tecnica_id');

            $table->double('l_bloque_base');
            $table->double('a_bloque_base');
            $table->double('e_bloque_base');    
            $table->integer('cant_ubloque_base');   //cantidad unidad
            $table->integer('cant_tbloque_base');   //cantidad total
            
            $table->double('l_tabla_base');
            $table->double('a_tabla_base');
            $table->double('e_tabla_base');
            $table->integer('cant_utabla_base');   //cantidad unidad
            $table->integer('cant_ttabla_base');   //cantidad total
            
            $table->double('l_stabla_base');
            $table->double('a_stabla_base');
            $table->double('e_stabla_base');
            $table->integer('cant_ustabla_base');   //cantidad unidad saldo
            $table->integer('cant_tstabla_base');   //cantidad total saldo
            
            $table->foreign('ficha_tecnica_id')->references('id')->on('ficha_tecnicas')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('base_repisas');
    }
};
