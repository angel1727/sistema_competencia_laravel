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
        Schema::create('experiencia_laboral', function (Blueprint $table) {
            $table->id('id_exp_laboral');
            $table->string('empresa')->nullable();
            $table->string('tipo_organizacion')->nullable();
            $table->string('cargo')->nullable();
            $table->text('descripcion_actividades')->nullable();
            $table->date('fecha_desde_exp')->nullable();
            $table->date('fecha_hasta_exp')->nullable();
            $table->string('duracion_meses_exp')->nullable();
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
        Schema::dropIfExists('experiencialaboral');
    }
};
