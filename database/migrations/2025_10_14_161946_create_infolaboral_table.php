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
        Schema::create('infolaboral', function (Blueprint $table) {
            $table->id('idinfolaboral');
            $table->string('nomempresa');
            $table->string('direccionL')->nullable();
            $table->string('departamento')->nullable();
            $table->string('info_celular')->nullable();
            $table->string('info_email')->nullable();
            $table->string('cargo');
            $table->string('tiempopermanencia')->nullable();
            $table->string('personareferencia')->nullable();
            $table->string('telefonoreferencia')->nullable();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('infolaboral');
    }
};
