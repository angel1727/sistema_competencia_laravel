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
        Schema::create('proveedoriensayotec', function (Blueprint $table) {
            $table->id('idensayotec');
            $table->string('ensayoMagnitud');
            $table->string('tecnica')->nullable();
            $table->string('normaDocumento')->nullable();
            $table->string('itemensayotec')->nullable();
            $table->string('tiempoexpEnsayotec')->nullable();
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
        Schema::dropIfExists('proveedoriensayotec');
    }
};
