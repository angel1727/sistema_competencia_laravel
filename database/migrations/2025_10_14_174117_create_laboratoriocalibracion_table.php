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
        Schema::create('laboratoriocalibracion', function (Blueprint $table) {
            $table->id('idlabcalibracion');
            $table->string('magnitudCalibracion');
            $table->string('itemCalibracion')->nullable();
            $table->string('normaCalibracion')->nullable();
            $table->string('tiempoexpCalibracion')->nullable();
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
        Schema::dropIfExists('laboratoriocalibracion');
    }
};
