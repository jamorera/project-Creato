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
        Schema::create('anexo_maderas', function (Blueprint $table) {
            $table->id();   
            $table->double('l_tabla_costadoA');
            $table->double('a_tabla_costadoA');
            $table->double('e_tabla_costadoA');
            $table->integer('cant_utabla_costadoA');   //cantidad unidad
            $table->integer('cant_ttabla_costadoA');   //cantidad total

            $table->double('l_stabla_costadoA');
            $table->double('a_stabla_costadoA');
            $table->double('e_stabla_costadoA');
            $table->integer('cant_ustabla_costadoA');   //cantidad unidad saldo
            $table->integer('cant_tstabla_costadoA');   //cantidad total saldo

            $table->double('l_tabla_costadoL'); 
            $table->double('a_tabla_costadoL');
            $table->double('e_tabla_costadoL');
            $table->integer('cant_utabla_costadoL');   //cantidad unidad
            $table->integer('cant_ttabla_costadoL');   //cantidad total

            $table->double('l_stabla_costadoL');
            $table->double('a_stabla_costadoL');
            $table->double('e_stabla_costadoL');
            $table->integer('cant_ustabla_costadoL');   //cantidad unidad saldo
            $table->integer('cant_tstabla_costadoL');   //cantidad total saldo

            $table->double('l_tabla_tapa'); 
            $table->double('a_tabla_tapa');
            $table->double('e_tabla_tapa');
            $table->integer('cant_utabla_tapa');   //cantidad unidad
            $table->integer('cant_ttabla_tapa');   //cantidad total
            
            $table->double('l_stabla_tapa');
            $table->double('a_stabla_tapa');
            $table->double('e_stabla_tapa');
            $table->integer('cant_ustabla_tapa');   //cantidad unidad saldo
            $table->integer('cant_tstabla_tapa');   //cantidad total saldo
            
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
        Schema::dropIfExists('anexo_maderas');
    }
};
