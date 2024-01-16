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
        Schema::create('sancion', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); 
            $table->decimal('monto'); 
            $table->date('fecha');
            $table->unsignedBigInteger('jugador_id'); 
            $table->timestamps();
            
            // Clave foránea que referencia la tabla 'jugadores'
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
        Schema::dropIfExists('sancion');
    }
};
