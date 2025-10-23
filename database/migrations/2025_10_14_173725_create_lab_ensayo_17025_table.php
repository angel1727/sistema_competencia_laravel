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
        Schema::create('lab_ensayo_17025', function (Blueprint $table) {
            $table->id('id_ensayo');
            $table->string('ensayo')->nullable();
            $table->string('tecnica_ens')->nullable();
            $table->string('norma_documento_ensayo')->nullable();
            $table->string('item_ensayo_matriz')->nullable();
            $table->string('tiempo_exp_ensayo')->nullable();
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
        Schema::dropIfExists('laboratorioensayo');
    }
};
