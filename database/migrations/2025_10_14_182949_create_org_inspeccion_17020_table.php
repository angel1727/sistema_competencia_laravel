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
        Schema::create('org_inspeccion_17020', function (Blueprint $table) {
            $table->id('id_inspeccion');
            $table->string('campo_sector')->nullable();
            $table->string('sub_sector')->nullable();
            $table->string('item_inspeccionado')->nullable();
            $table->string('metodo_doc_normativo')->nullable();
            $table->string('tiempo_exp_inspeccion')->nullable();
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
        Schema::dropIfExists('organismoinspeccion');
    }
};
