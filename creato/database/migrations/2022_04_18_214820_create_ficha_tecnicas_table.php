<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ficha_tecnicas', function (Blueprint $table) {
            $table->id();   
            $table->unsignedBigInteger('solicitud_id')->unique();    
            
            $table->enum('tipo_de_base',['bloque','taco','repisa']);  
            $table->boolean('pestana');  
            $table->double('l_externo');
            $table->double('a_externo');
            $table->double('h_externo');

            $table->double('l_liston_costadoA');    
            $table->double('a_liston_costadoA');    
            $table->double('e_liston_costadoA');    
            $table->integer('cant_uliston_costadoA'); //cantidad unidad
            $table->integer('cant_tliston_costadoA'); //cantidad total   

            $table->double('l_liston_costadoL');
            $table->double('a_liston_costadoL');
            $table->double('e_liston_costadoL');    
            $table->integer('cant_uliston_costadoL'); //cantidad unidad
            $table->integer('cant_tliston_costadoL'); //cantidad total  
             
            $table->double('l_liston_tapa');
            $table->double('a_liston_tapa');
            $table->double('e_liston_tapa');    
            $table->integer('cant_uliston_tapa'); //cantidad unidad
            $table->integer('cant_tliston_tapa'); //cantidad total

            $table->foreign('solicitud_id')->references('id')->on('solicituds')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('ficha_tecnicas');
    }
};
