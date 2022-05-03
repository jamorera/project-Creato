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
            $table->string('descripcion');  
            $table->enum('tipo',['triplex','bloque','repiza','tabla','carton']);
            $table->boolean('largo');
            $table->boolean('ancho');
            $table->boolean('espesor');
            $table->boolean('valor_unitario');
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
