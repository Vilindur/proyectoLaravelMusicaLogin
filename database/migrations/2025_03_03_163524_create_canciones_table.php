<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('artista');
            $table->string('album')->nullable();
            $table->string('genero')->nullable();
            $table->date('fecha_lanzamiento')->nullable();
            $table->float('precio')->nullable();
            $table->float('puntuacion')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps(); //created_at updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canciones');
    }
};