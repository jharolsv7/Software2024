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
        Schema::create('infoweb', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_campeonato'); // Agrega una columna de fecha para fecha_campeonato.
            $table->string('foto_sitio')->nullable(); // Agrega una columna de cadena para foto_sitio (puede ser nula).
            $table->text('informacion')->nullable();
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
        Schema::dropIfExists('infoweb');
    }
};
