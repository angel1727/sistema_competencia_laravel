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
        Schema::create('experiencialaboral', function (Blueprint $table) {
            $table->id('idexpLaboral');
            $table->string('empresa_institucion');
            $table->string('tipoOrganizacion')->nullable();
            $table->string('cargoDesempeñado');
            $table->text('descripcionLaboral')->nullable();
            $table->date('desde')->nullable();
            $table->date('hasta')->nullable();
            $table->string('duracionLaboral')->nullable();
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
        Schema::dropIfExists('experiencialaboral');
    }
};
