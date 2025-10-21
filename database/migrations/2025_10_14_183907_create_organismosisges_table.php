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
        Schema::create('organismosisges', function (Blueprint $table) {
            $table->id('idsisges');
            $table->string('sisges');
            $table->string('normasisges')->nullable();
            $table->string('codigosisges')->nullable();
            $table->string('sectorsisges')->nullable();
            $table->string('tiempoexpsisges')->nullable();
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
        Schema::dropIfExists('organismosisges');
    }
};
