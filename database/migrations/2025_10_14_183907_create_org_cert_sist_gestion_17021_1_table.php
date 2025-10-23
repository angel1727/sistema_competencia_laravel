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
        Schema::create('org_cert_sist_gestion_17021_1', function (Blueprint $table) {
            $table->id('id_sg');
            $table->string('sistema_gestion');
            $table->string('norma')->nullable();
            $table->string('codigo_iaf_sector')->nullable();
            $table->string('nombre_sector')->nullable();
            $table->string('tiempo_exp_sg')->nullable();
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
        Schema::dropIfExists('organismosisges');
    }
};
