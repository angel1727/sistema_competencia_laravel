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
        Schema::create('certificacion_personas_17024', function (Blueprint $table) {
            $table->id('id_cert_persona');
            $table->string('sector_campo');
            $table->string('actividad_especifica');
            $table->string('item_matriz')->nullable();
            $table->string('norma_documento_pers')->nullable();
            $table->string('tiempo_exp_pers')->nullable();
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
        Schema::dropIfExists('certificacionpersona');
    }
};
