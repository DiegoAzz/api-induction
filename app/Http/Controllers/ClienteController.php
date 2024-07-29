<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Client::all();
        return view('sistema.clientes.listCliente',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('sistema.clientes.addCliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'razon_social' => 'required|string|max:100',
            'nit' => 'required|string|max:75',
            'email' => 'required|email|unique:clients,email|max:75',
            'telefono' => 'required|numeric|min:15',
            'direccion' => 'required|string|max:75',
            'ciudad' => 'required|string|max:75',
            'contacto' => 'required|string|max:75',
          
            
            

        ]);

        $cliente = new Client();
        $cliente->razon_social = $request->input('razon_social');
        $cliente->nit = $request->input('nit');   
        $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->ciudad = $request->input('ciudad');
        $cliente->contacto = $request->input('contacto');

        $cliente->save();

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
        $cliente = Client::find($id);
        return view('sistema.clientes.editCliente',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Client::find($id);
        $cliente->razon_social = $request->input('razon_social');
        $cliente->nit = $request->input('nit');   
        $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->ciudad = $request->input('ciudad');
        $cliente->contacto = $request->input('contacto');

        $cliente->save();

        return back()->with('message','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Client::find($id);
        $cliente->delete();
        return back();
    }
}
