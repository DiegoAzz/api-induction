<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;
use App\Models\Client;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sedes = Sede::all();
        return view('sistema.clientes.sedes.listSede',compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();       
        return view('sistema.clientes.sedes.addSede',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'responsable' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'cedula' => 'required',
            'cargo' => 'required',
            'cliente_id' => 'required'

        ]);

        $sede = new Sede();
        $sede->nombre = $request->input('nombre');
        $sede->direccion = $request->input('direccion');
        $sede->responsable = $request->input('responsable');
        $sede->telefono = $request->input('telefono');
        $sede->email = $request->input('email');
        $sede->cedula = $request->input('cedula');
        $sede->cargo = $request->input('cargo');
        $sede->cliente_id = $request->input('cliente_id');


        $sede->save();

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
        $sede = Sede::find($id);
        return view('sistema.clientes.sedes.editSede',compact('sede'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sede = Sede::find($id);

        $sede->nombre = $request->input('nombre');
        $sede->direccion = $request->input('direccion');
        $sede->responsable = $request->input('responsable');
        $sede->telefono = $request->input('telefono');
        $sede->email = $request->input('email');
        $sede->cedula = $request->input('cedula');
        $sede->cargo = $request->input('cargo');
        $sede->cliente_id = $request->input('cliente_id');


        $sede->save();

        return back()->with('message','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sede = Sede::find($id);
        $sede->delete();
        return back();
    }
}
