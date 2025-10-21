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
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id('idpostulante');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('ci')->unique();
            $table->string('ciudad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('email')->unique();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('nit')->nullable();
            $table->string('siged')->nullable();
            $table->string('matricula')->nullable();
            $table->string('seguro')->nullable();
            $table->string('sriesgos')->nullable();
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
