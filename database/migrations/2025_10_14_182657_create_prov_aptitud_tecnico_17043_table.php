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
        Schema::create('prov_aptitud_tecnico_17043', function (Blueprint $table) {
            $table->id('id_prov_tecnico');
            $table->string('ensayo_magnitud');
            $table->string('tecnica_tec')->nullable();
            $table->string('norma_documento_tecnico')->nullable();
            $table->string('item_muestra')->nullable();
            $table->string('tiempo_exp_tecnico')->nullable();
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
        Schema::dropIfExists('proveedoriensayotec');
    }
};
