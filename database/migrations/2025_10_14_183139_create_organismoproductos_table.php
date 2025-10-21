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
        Schema::create('organismoproductos', function (Blueprint $table) {
            $table->id('idproducto');
            $table->string('tipocerti');
            $table->string('producto');
            $table->string('documentosNormativo')->nullable();
            $table->string('divisionNace')->nullable();
            $table->string('codigoCPA')->nullable();
            $table->string('tiempoexpProductos')->nullable();
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
        Schema::dropIfExists('organismoproductos');
    }
};
