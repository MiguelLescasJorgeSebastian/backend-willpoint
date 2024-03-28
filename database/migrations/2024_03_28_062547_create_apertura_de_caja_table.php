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
        Schema::create('apertura_de_caja', function (Blueprint $table) {
            $table->id();
            $table->integer('IDMovimiento');
            $table->timestamp('Fecha');
            $table->time('HoraApertura');
            $table->foreignId('EmpleadoID')->constrained('empleados');
            $table->decimal('MontoInicial', 8, 2);
            $table->time('HoraCierre')->nullable();
            $table->decimal('MontoFinal', 8, 2)->nullable();
            $table->text('Notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apertura_de_caja');
    }
};
