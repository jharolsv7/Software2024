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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->string('ubicacion');
            $table->integer('golesEquipo1');
            $table->integer('golesEquipo2');
            $table->integer('tarjetaAmarilla');
            $table->integer('tarjetaRoja');
            $table->unsignedBigInteger('equipo_uno');
            $table->unsignedBigInteger('equipo_dos');
            $table->timestamps();

            // Definir claves foráneas
            $table->foreign('equipo_uno')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('equipo_dos')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
};
