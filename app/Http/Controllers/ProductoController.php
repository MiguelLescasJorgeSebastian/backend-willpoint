<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.

    */
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre' => 'required',
                'precio_compra' => 'required',
                'precio_venta' => 'required',
                'stock' => 'required',
                'fecha_caducidad' => 'required',
                'proveedor_id' => 'required|exists:proveedors,id'
            ]);
            $producto = Producto::create($request->all());
            return response()->json($producto);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear el producto',
                'error' => $e->getMessage()
            ], 400);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return response()->json($producto);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar el producto',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
    }
}
