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
        Schema::create('EJERCICIO_RUTINA', function (Blueprint $table) {
            $table->id('idEjercicioRutina');
            $table->unsignedBigInteger('idRutina');
            $table->unsignedBigInteger('idEjercicio');
            $table->integer('series');
            $table->integer('repeticiones');
            $table->integer('descanso');
            $table->timestamps();

            $table->foreign('idRutina')
                ->references('idRutina')
                ->on('RUTINA')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('idEjercicio')
                ->references('idEjercicio')
                ->on('EJERCICIO')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('EJERCICIO_RUTINA');
    }
};
