<?php

namespace App\Console\Commands;

use App\Models\Producto;
use Illuminate\Console\Command;

class RecomendacionesPedidos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:recomendaciones-pedidos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $productos = Producto::all();
        $productos->each(function ($producto) {
            $stock = $producto->stock;
            if ($stock < 10) {
                $proveedor = $producto->proveedor;
                $empresa = $proveedor->empresa;
                $this->info("Se recomienda hacer un pedido de {$producto->nombre} a {$proveedor->nombre} de la empresa {$empresa->nombre}");
            }
        });
    }
}
