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
        Schema::create('org_cert_productos_17065', function (Blueprint $table) {
            $table->id('id_productos');
            $table->string('tipo_certificacion');
            $table->string('producto_servicio');
            $table->string('documento_normativo')->nullable();
            $table->string('division_nace')->nullable();
            $table->string('codigo_cpa')->nullable();
            $table->string('tiempo_exp_productos')->nullable();
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
        Schema::dropIfExists('organismoproductos');
    }
};
