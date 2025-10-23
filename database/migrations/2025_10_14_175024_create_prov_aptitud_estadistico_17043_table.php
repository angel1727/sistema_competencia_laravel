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
        Schema::create('prov_aptitud_estadistico_17043', function (Blueprint $table) {
            $table->id('id_prov_estadistico');
            $table->string('nombre_ea_cil');
            $table->string('empresa_contratante')->nullable();
            $table->string('software_utilizado')->nullable();
            $table->string('norma_aplicada')->nullable();
            $table->string('tiempo_desarrollo_meses')->nullable();
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
        Schema::dropIfExists('proveedorensayoetd');
    }
};
