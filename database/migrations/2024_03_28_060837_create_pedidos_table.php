<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('PedidoID');
            $table->timestamp('Fecha');
            $table->time('Hora');
            $table->foreignId('ProductoID')->constrained('productos');
            $table->integer('Cantidad');
            $table->foreignId('ProveedorID')->constrained('proveedors');
            $table->decimal('MontoAprox', 8, 2);
            $table->decimal('Impuesto', 8, 2);
            $table->enum('Estado', ['Solicitud', 'Proceso', 'Entregado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}

?>
