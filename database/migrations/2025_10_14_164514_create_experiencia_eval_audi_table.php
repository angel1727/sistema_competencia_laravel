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
        Schema::create('experiencia_eval_audi', function (Blueprint $table) {
            $table->id('id_exp_eval_audi');
            $table->string('eval_audi');
            $table->string('organizacion_contratante');
            $table->string('organizacion_evaluada');
            $table->string('tipo_organismo');
            $table->string('rol_designado');
            $table->string('norma_aplicada');
            $table->date('fecha_eval_audi');
            $table->integer('duracion_horas');
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
        Schema::dropIfExists('experienciaaudiriaud');
    }
};
