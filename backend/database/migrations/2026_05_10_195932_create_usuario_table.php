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
        Schema::create('USUARIO', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('nombre', 100);
            $table->string('apellidos', 150);
            $table->string('correo', 150)->unique();
            $table->string('contrasena', 255);
            $table->text('foto_url')->nullable();
            $table->tinyInteger('tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('USUARIO');
    }
};
