<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $muestras = Muestra::all();
        return view('sistema.muestras.listTipoMuestras',compact('muestras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistema.muestras.addTipoMuestra');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'tipo' => 'required',

        ]);

        $muestra = new Muestra();
        $muestra->tipo = $request->input('tipo');


        $muestra->save();

        return back()->with('message','ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'axx';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $muestra = Muestra::find($id);
        return view('sistema.muestras.editTipoMuestra',compact('muestra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $muestra = Muestra::find($id);

        $muestra->tipo = $request->input('tipo');


        $muestra->save();

        return back()->with('message','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $muestra = Muestra::find($id);
        $muestra->delete();
        return back();
    }
}
