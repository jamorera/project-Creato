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
        Schema::create('madera_laminas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',200);  
            $table->enum('tipo',['triplex','bloque','liston','repisa','tabla','carton']);
            $table->double('largo',5,2);
            $table->double('ancho',5,2);
            $table->double('espesor',3,2);
            $table->double('valor_unitario',18,3);
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
        Schema::dropIfExists('madera_laminas');
    }
};
