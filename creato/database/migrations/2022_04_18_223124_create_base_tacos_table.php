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
        Schema::create('base_tacos', function (Blueprint $table) {
            $table->id();
            $table->double('l_taco_base');
            $table->double('a_taco_base');
            $table->double('e_taco_base');
            $table->integer('cant_utaco_base'); //cantidad unidad
            $table->integer('cant_ttaco_base'); //cantidad total

            $table->double('l_tabla_base_sup');
            $table->double('a_tabla_base_sup');
            $table->double('e_tabla_base_sup');
            $table->integer('cant_utabla_base_sup'); //cantidad unidad superior
            $table->integer('cant_ttabla_base_sup'); //cantidad total superior   
            
            $table->double('l_tabla_taco');
            $table->double('a_tabla_taco');
            $table->double('e_tabla_taco');
            $table->integer('cant_utabla_taco'); //cantidad unidad
            $table->integer('cant_ttabla_taco'); //cantidad total
            
            $table->double('l_tabla_base_inf');
            $table->double('a_tabla_base_inf');
            $table->double('e_tabla_base_inf');
            $table->integer('cant_utabla_base_inf'); //cantidad unidad inferior
            $table->integer('cant_ttabla_base_inf'); //cantidad total inferior
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
        Schema::dropIfExists('base_tacos');
    }
};
