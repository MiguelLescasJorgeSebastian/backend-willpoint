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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['venta', 'compra']);
            $table->decimal('monto', 8, 2);
            $table->text('descripcion')->nullable();
            $table->foreignId('venta_id')->nullable()->constrained('ventas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('compra_id')->nullable()->constrained('compras')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccions');
    }
};
