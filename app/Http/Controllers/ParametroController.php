<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parametros = Parametro::all();
        return view('sistema.parametros.listParametros',compact('parametros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistema.parametros.addMicro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'parametro' => 'required',       

        ]);

        $parametro = new Parametro();
        $parametro->parametro = $request->input('parametro');    

        $parametro->save();

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
        $parametro = Parametro::find($id);
        return view('sistema.parametros.editParametro',compact('parametro'));
    }

    public function update(Request $request, string $id)
    {
        $parametro = Parametro::find($id);

        $parametro->parametro = $request->input('parametro');
       

        $parametro->save();

        return back()->with('message','Actualizado Correctamente');
    }

    public function destroy(string $id)
    {
        $parametro = Parametro::find($id);
        $parametro->delete();
        return back();
    }
}
