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
        Schema::create('experienciaimplementacion', function (Blueprint $table) {
            $table->id('idexpimplementacion');
            $table->string('organizacioni');
            $table->string('orgBeneficiada');
            $table->string('funcion');
            $table->date('fechaImplementacion');
            $table->integer('duracionhorasImplementacion');
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
        Schema::dropIfExists('experienciaimplementacion');
    }
};
