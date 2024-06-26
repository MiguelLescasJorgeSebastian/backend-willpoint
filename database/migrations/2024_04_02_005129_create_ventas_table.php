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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('empleado_id')->constrained('empleados')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->timestamp('fecha');
            $table->integer('puntos_ganados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
