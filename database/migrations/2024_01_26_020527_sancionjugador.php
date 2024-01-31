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
        Schema::create('sancionjugador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jugador_id');
            $table->string('detalles');
            $table->date('fecha'); 
            $table->decimal('monto');
            $table->boolean('estado')->default(true); 
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
        Schema::dropIfExists('sancionjugador');
    }
};
