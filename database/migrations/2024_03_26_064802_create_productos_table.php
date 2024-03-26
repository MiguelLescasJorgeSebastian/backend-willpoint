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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_caducidad');
            $table->string('nombre');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->integer('stock');
            $table->string('imagen');
            $table->integer('codigo_barras')->unique()-> nullable();
            $table->timestamps();
            $table->foreignId('proveedor_id')->constrained('proveedores')->onUpdate('cascade')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
