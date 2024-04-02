<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return response()->json($empresas);

    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre' => 'required|unique:empresas',
            ]);
            $empresa = Empresa::create($request->all());
            return response()->json($empresa, 201);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear la empresa',
                'error' => $e->getMessage()
            ], 400);
        }
    }
    

    public function update($id, Request $request)
    {
        try{
            $empresa = Empresa::findOrFail($id);
            $request->validate([
                'nombre' => ['required',Rule::unique('empresas')->ignore($empresa)]
            ]);
            $empresa->update($request->all());
        }catch(\Exception $e){
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
    }
}
