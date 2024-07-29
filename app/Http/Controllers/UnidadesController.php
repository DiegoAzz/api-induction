<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidades;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = Unidades::all();
        return view('sistema.unidades.listUnidades',compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistema.unidades.addUnidades');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'tipo_analisis' => 'required',
            'parametro' => 'required',
            'unidad' => 'required' 

        ]);

        $unidades = new Unidades();
        $unidades->tipo_analisis = $request->input('tipo_analisis');
        $unidades->parametro = $request->input('parametro');
        $unidades->unidad = $request->input('unidad');
   


        $unidades->save();

        return back()->with('message','ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unidades = Unidades::find($id);
        return view('sistema.unidades.editUnidades',compact('unidades'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validacion = $request->validate([
            'tipo_analisis' => 'required',
            'parametro' => 'required',
            'unidad' => 'required' 

        ]);
        
        $unidades = Unidades::find($id);
        $unidades->tipo_analisis = $request->input('tipo_analisis');
        $unidades->parametro = $request->input('parametro');
        $unidades->unidad = $request->input('unidad');
        $unidades->save();
        return back()->with('message','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unidad = Unidades::find($id);
        $unidad->delete();
        return back();
    }
}
