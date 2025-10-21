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
        Schema::create('proveedorensayoetd', function (Blueprint $table) {
            $table->id('idensayoetd');
            $table->string('nombreEA');
            $table->string('empresaContratante')->nullable();
            $table->string('software')->nullable();
            $table->string('normasDatos')->nullable();
            $table->string('tiempodesarrollo')->nullable();
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
        Schema::dropIfExists('proveedorensayoetd');
    }
};
