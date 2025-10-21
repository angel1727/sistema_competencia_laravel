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
        Schema::create('organismoinspeccion', function (Blueprint $table) {
            $table->id('idinspeccion');
            $table->string('campoInspeccion');
            $table->string('subsector')->nullable();
            $table->string('iteminspeccion')->nullable();
            $table->string('metodoInspeccion')->nullable();
            $table->string('tiempoexpInspeccion')->nullable();
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
        Schema::dropIfExists('organismoinspeccion');
    }
};
