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
        Schema::create('goleadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partido_id');
            $table->unsignedBigInteger('jugador_id');
            $table->integer('goles')->default(0);
            $table->timestamps();

            // Definir claves foráneas
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete('cascade');
            $table->foreign('jugador_id')->references('id')->on('jugador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goleadores');
    }
};
