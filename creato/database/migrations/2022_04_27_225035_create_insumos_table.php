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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',200);
            $table->string('proveedor',50);
            $table->enum('tipo_unidad',['rollo','lamina','Unidad']); 
            $table->integer('cantidad_tipo_unidad')->length(5)->unsigned();
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
        Schema::dropIfExists('insumos');
    }
};
