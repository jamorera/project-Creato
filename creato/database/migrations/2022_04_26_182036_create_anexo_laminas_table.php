<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexo_laminas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_tecnica_id');
            
            $table->boolean('l_liston_costadoA');   
            $table->boolean('a_liston_costadoA');
            $table->boolean('e_liston_costadoA');
            $table->integer('cant_uliston_costadoA'); //cantidad unidad
            $table->integer('cant_tliston_costadoA'); //cantidad total
            
            $table->boolean('l_lamina_costadoA');
            $table->boolean('a_lamina_costadoA');
            $table->boolean('e_lamina_costadoA');
            $table->integer('cant_ulamina_costadoA'); //cantidad unidad
            $table->integer('cant_tlamina_costadoA'); //cantidad total
            
            $table->boolean('l_liston_costadoL');
            $table->boolean('a_liston_costadoL');
            $table->boolean('e_liston_costadoL');
            $table->integer('cant_uliston_costadoL'); //cantidad unidad
            $table->integer('cant_tliston_costadoL'); //cantidad total

            $table->boolean('l_liston_costadoL_int');
            $table->boolean('a_liston_costadoL_int');
            $table->boolean('e_liston_costadoL_int');
            $table->integer('cant_uliston_costadoL_int'); //cantidad unidad interno
            $table->integer('cant_tliston_costadoL_int'); //cantidad total interno

            $table->boolean('l_lamina_costadoL');
            $table->boolean('a_lamina_costadoL');
            $table->boolean('e_lamina_costadoL');
            $table->integer('cant_ulamina_costadoL'); //cantidad unidad
            $table->integer('cant_tlamina_costadoL'); //cantidad total
            
            $table->boolean('l_liston_tapa');
            $table->boolean('a_liston_tapa');
            $table->boolean('e_liston_tapa');
            $table->integer('cant_uliston_tapa'); //cantidad unidad
            $table->integer('cant_tliston_tapa'); //cantidad total
            
            $table->boolean('l_liston_tapa_int');
            $table->boolean('a_liston_tapa_int');
            $table->boolean('e_liston_tapa_int');
            $table->integer('cant_uliston_tapa_int'); //cantidad unidad interno
            $table->integer('cant_tliston_tapa_int'); //cantidad total interno
            
            $table->boolean('l_lamina_tapa');
            $table->boolean('a_lamina_tapa');
            $table->boolean('e_lamina_tapa');
            $table->integer('cant_ulamina_tapa'); //cantidad unidad
            $table->integer('cant_tlamina_tapa'); //cantidad total
            
            $table->foreign('ficha_tecnica_id')->references('id')->on('ficha_tecnicas')->onDelete('cascade');
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
        Schema::dropIfExists('anexo_laminas');
    }
};
