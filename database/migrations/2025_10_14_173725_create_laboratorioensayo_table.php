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
        Schema::create('laboratorioensayo', function (Blueprint $table) {
            $table->id('idlabensayo');
            $table->string('ensayo');
            $table->string('tecnicaEnsayo')->nullable();
            $table->string('normaEnsayo')->nullable();
            $table->string('itemEnsayo')->nullable();
            $table->string('tiempoexpEnsayo')->nullable();
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
        Schema::dropIfExists('laboratorioensayo');
    }
};
