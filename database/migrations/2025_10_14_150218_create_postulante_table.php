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
        Schema::create('postulante', function (Blueprint $table) {
            $table->id('id_postulante');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula_identidad')->unique();
            $table->string('ciudad_residencia')->nullable();
            $table->string('direccion_residencia')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('correo')->unique();
            $table->string('telefono_movil')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('nit')->nullable();
            $table->string('registro_sigep')->nullable();
            $table->string('matricula_comercio')->nullable();
            $table->string('seguro_salud')->nullable();
            $table->string('seguro_riesgos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulantes');
    }
};
