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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ProductoID')->constrained('productos');
            $table->decimal('PrecioCompra', 8, 2);
            $table->decimal('PrecioVenta', 8, 2);
            $table->integer('Cantidad');
            $table->enum('MetodoPago', ['Efectivo', 'Tarjeta', 'Transferencia', 'Cheque']);
            $table->decimal('Impuestos', 8, 2);
            $table->decimal('Descuento', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
