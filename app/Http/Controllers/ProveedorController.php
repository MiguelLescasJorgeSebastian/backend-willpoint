<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return response()->json($proveedores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre' => 'required|unique:proveedors',
                'telefono' => 'required',
                'direccion' => 'required',
                'email' => 'required|email',
                'empresa_id' => 'required|exists:empresas,id'
            ]);
            $proveedor = Proveedor::create($request->all());
            return response()->json($proveedor);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear el proveedor',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return response()->json($proveedor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->update($request->all());
            return response()->json($proveedor);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar el proveedor',
                'error' => $e->getMessage()
            ], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
    }
}
