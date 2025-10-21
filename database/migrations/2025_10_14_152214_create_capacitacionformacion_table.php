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
        Schema::create('capacitacionformacion', function (Blueprint $table) {
            $table->id('idcapacitacion');
            $table->string('esquema');
            $table->string('tipoformacion');
            $table->string('tema');
            $table->string('orgcapacitacion');
            $table->date('fecha');
            $table->integer('duracionhoras');
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
        Schema::dropIfExists('capacitacionformacion');
    }
};
