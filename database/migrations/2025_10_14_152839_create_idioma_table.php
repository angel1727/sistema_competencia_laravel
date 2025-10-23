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
        Schema::create('idioma', function (Blueprint $table) {
            $table->id('id_idioma');
            $table->string('idioma');
            $table->string('nivel_escritura')->nullable();
            $table->string('nivel_oral')->nullable();
            $table->string('nombre_curso')->nullable();
            $table->string('entidad_emisora')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->unsignedBigInteger('id_postulante');
            $table->foreign('id_postulante')->references('id_postulante')->on('postulante')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idiomas');
    }
};
