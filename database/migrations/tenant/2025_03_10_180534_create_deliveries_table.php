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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->string('tracking');
            $table->string('motorista');
            $table->string('origen');
            $table->string('vehiculo');
            $table->date('fecha');
            $table->enum('staus', [
                'En Ruta',
                'Completado',
                'Pendiente',
                'Cancelado'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
