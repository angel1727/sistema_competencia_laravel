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
        Schema::create('laboratorioclinico', function (Blueprint $table) {
            $table->id('idlabclinico');
            $table->string('areaClinico');
            $table->string('analisisClinico');
            $table->string('tecnicaClinico')->nullable();
            $table->string('muestraClinico')->nullable();
            $table->string('tiempoexpClinico')->nullable();
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
        Schema::dropIfExists('laboratorioclinico');
    }
};
