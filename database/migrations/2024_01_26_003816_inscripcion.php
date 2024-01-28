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
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion'); 
            $table->decimal('monto'); 
            $table->date('fecha');
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('equipo_id'); 
            $table->timestamps();
            
            // Clave foránea que referencia la tabla 'jugadores'
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcion');
    }
};
