<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Empresa::all();
    }
    public function store(Request $request)
    {

        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->save();
    }

    public function update(Request $request, Empresa $empresa)
    {
        $empresa = Empresa::findOrFail($request->id);
        $empresa->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
    }
}
