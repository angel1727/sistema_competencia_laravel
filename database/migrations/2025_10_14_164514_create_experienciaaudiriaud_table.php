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
        Schema::create('experienciaaudiriaud', function (Blueprint $table) {
            $table->id('idexpauditoriaud');
            $table->string('evaluacion');
            $table->string('organizacionad');
            $table->string('orgEvaluada');
            $table->string('tipoOrganismo');
            $table->string('rolDesignado');
            $table->string('normaaplicada');
            $table->date('fechaEva');
            $table->integer('duracionhorasEva');
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
        Schema::dropIfExists('experienciaaudiriaud');
    }
};
