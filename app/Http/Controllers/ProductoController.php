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
        $producto = Producto::create($request->all());
        $producto->save();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $producto = Producto::findOrFail($request->id);
        $producto->update($request->all());
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        $producto->delete();
        return response()->json($producto);
    }
}
