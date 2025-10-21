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
        Schema::create('certificacionpersona', function (Blueprint $table) {
            $table->id('idcertipersona');
            $table->string('sectorCampo');
            $table->string('actividadEspecifica');
            $table->string('itemMatriz')->nullable();
            $table->string('normaDocumentos')->nullable();
            $table->string('tiempoexpCert')->nullable();
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
        Schema::dropIfExists('certificacionpersona');
    }
};
