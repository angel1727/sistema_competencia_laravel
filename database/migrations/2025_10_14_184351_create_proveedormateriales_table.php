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
        Schema::create('proveedormateriales', function (Blueprint $table) {
            $table->id('idmateriales');
            $table->string('ensayoMateriales');
            $table->string('tecnicaMateriales')->nullable();
            $table->string('normadocumento')->nullable();
            $table->string('itemensayoMateriales')->nullable();
            $table->string('tiempoexpMateriales')->nullable();
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
        Schema::dropIfExists('proveedormateriales');
    }
};
