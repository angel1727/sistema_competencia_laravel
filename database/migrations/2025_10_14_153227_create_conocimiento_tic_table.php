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
        Schema::create('conocimiento_tic', function (Blueprint $table) {
            $table->id('id_tic');
            $table->string('herramienta_tecnologica');
            $table->string('nivel_conocimiento');
            $table->string('frecuencia_uso');
            $table->string('certificacion')->nullable();
            $table->string('nombre_entidad_capacitacion')->nullable();
            $table->date('fecha_tic')->nullable();
            $table->unsignedBigInteger('idpostulante');
            $table->foreign('idpostulante')->references('idpostulante')->on('postulantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conocimiento_tic');
    }
};
