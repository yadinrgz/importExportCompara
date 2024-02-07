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
        Schema::create('prots', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('lector');
            $table->string('nombre_lector');
            $table->string('serie');
            $table->string('host');
            $table->string('ip');
            $table->string('terminal');
            $table->string('puerto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prots');
    }
};
