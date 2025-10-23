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
        Schema::create('prov_material_ref_17034', function (Blueprint $table) {
            $table->id('id_prov_material');
            $table->string('ensayo_mat');
            $table->string('tecnica_mat')->nullable();
            $table->string('norma_documento_mat')->nullable();
            $table->string('item_ensayo_muestra')->nullable();
            $table->string('tiempo_exp_mat')->nullable();
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
        Schema::dropIfExists('proveedormateriales');
    }
};
