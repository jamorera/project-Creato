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
        Schema::create('costos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_tecnica_id');
            
            $table->string('descripcion');
            $table->double('cantidad');
            $table->double('valor_unitario');
            $table->double('valor_total');
            $table->enum('estado',['inicial','novedad','final']);

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
        Schema::dropIfExists('costos');
    }
};
