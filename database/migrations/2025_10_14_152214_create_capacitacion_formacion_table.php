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
        Schema::create('capacitacion_formacion', function (Blueprint $table) {
            $table->id('id_capacitacion');
            $table->string('esquema_capac')->nullable();
            $table->string('tipo_capac')->nullable();
            $table->string('tema_capac')->nullable();
            $table->string('organismo_capac')->nullable();
            $table->date('fecha_capac')->nullable();
            $table->integer('duracion_horas_capac')->nullable();
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
        Schema::dropIfExists('capacitacionformacion');
    }
};
