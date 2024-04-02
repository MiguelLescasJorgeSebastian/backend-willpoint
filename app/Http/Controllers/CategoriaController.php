<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre' => 'required',
                'claveSat' => 'required'
            ]);
            $categoria = Categoria::create($request->all());
            return response()->json($categoria);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear la categoria',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $categoria = Categoria::findOrFail($id);
            $categoria->update($request->all());
            return response()->json($categoria);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar la categoria',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            return response()->json([
                'message' => 'Categoria eliminada'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar la categoria',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
