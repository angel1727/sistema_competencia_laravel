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
        Schema::create('experiencia_impl_cons', function (Blueprint $table) {
            $table->id('id_exp_impl_cons');
            $table->string('organizacion_servicio');
            $table->string('organizacion_beneficiada');
            $table->string('funcion_impl');
            $table->date('fecha_impl');
            $table->integer('duracion_horas_impl');
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
        Schema::dropIfExists('experienciaimplementacion');
    }
};
