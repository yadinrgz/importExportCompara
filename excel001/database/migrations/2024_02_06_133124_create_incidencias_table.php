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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('numemp_in');
            $table->string('clave_hor');
            $table->string('horario');
            $table->string('fecha_ini');
            $table->string('fecha_fin');
            $table->string('incidencia');
            $table->string('detalle_hor');
            $table->string('reg_entrada');
            $table->string('reg_salida');
            $table->string('horas_trabajadas');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
