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
        Schema::create('informacion_laboral', function (Blueprint $table) {
            $table->id('id_info_laboral');
            $table->string('nombre_empresa');
            $table->string('direccion_empresa')->nullable();
            $table->string('departamento_empresa')->nullable();
            $table->string('telefono_empresa')->nullable();
            $table->string('correo_empresa')->nullable();
            $table->string('cargo_empresa')->nullable();
            $table->string('tiempo_permanencia')->nullable();
            $table->string('persona_referencia')->nullable();
            $table->string('telefono_referencia')->nullable();
            $table->text('descripcion_responsabilidades')->nullable();
            $table->unsignedBigInteger('id_postulante');
            $table->foreign('id_postulante')->references('id_postulante')->on('postulante')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infolaboral');
    }
};
