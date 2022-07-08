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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            
            $table->enum('tipoHuacal',['triplex','madera','carton','jaula']);
            $table->double('l_huacal'); 
            $table->double('a_huacal');
            $table->double('h_huacal');
            $table->double('peso');
            $table->integer('cantidad');
            $table->double('separacion')->nullable();  
            
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('solicituds');
    }
};
