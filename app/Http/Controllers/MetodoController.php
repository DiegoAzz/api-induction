<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidades;
use App\Models\ParametroF;
use App\Models\Metodo;
use App\Models\Parametro;

class MetodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodos = Metodo::all();
        return view('sistema.metodos.listMetodo',compact('metodos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parametros = Parametro::all();
        $parametroF = ParametroF::all();
        $unidades = Unidades::all();
        return view('sistema.metodos.addMetodo',compact('parametros','unidades','parametroF'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'tipo_analisis' => 'required|string',
            'parametro' => 'required|string',
            'metodo' => 'required|string',
            'unidades' => 'required|string',            
          
            
            

        ]);

        $metodo = new Metodo();
        $metodo->tipo_analisis = $request->input('tipo_analisis');
        $metodo->parametro = $request->input('parametro');
        $metodo->metodo = $request->input('metodo');
        $metodo->unidades = $request->input('unidades');
   


        $metodo->save();

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
        $parametros = Parametro::all();
        $metodo = Metodo::find($id);
        $unidades = Unidades::all();
        return view('sistema.metodos.editMetodo',compact('unidades','metodo','parametros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validacion = $request->validate([
            'tipo_analisis' => 'required|string',
            'parametro' => 'required|string',
            'metodo' => 'required|string',
            'unidades' => 'required|string', 
        ]);

        $metodo = Metodo::find($id);
        $metodo->tipo_analisis = $request->input('tipo_analisis');
        $metodo->parametro = $request->input('parametro');
        $metodo->metodo = $request->input('metodo');
        $metodo->unidades = $request->input('unidades');
   


        $metodo->save();

        return back()->with('message','ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $metodo = Metodo::find($id);
        $metodo->delete();
        return back();
    }
}
