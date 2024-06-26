<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return response()->json($empleados);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre' => 'required',
                'telefono' => 'required',
                'email' => 'required|unique:empleados',
                'password' => 'required',
                'rol' => 'required'
            ]);
            $empleado = Empleado::create($request->all());
            return response()->json($empleado, 201);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear el empleado',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return response()->json($empleado);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $empleado = Empleado::findOrFail($id);
            $empleado->update($request->all());
            return response()->json($empleado);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar el empleado',
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
            $empleado = Empleado::findOrFail($id);
            $empleado->delete();
            return response()->json([
                'message' => 'Empleado eliminado'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar el empleado',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
