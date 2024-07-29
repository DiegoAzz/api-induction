<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('sistema.servicios.listServicio',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistema.servicios.addServicio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'producto_servicio' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
       

        ]);

        $servicio = new Servicio();
        $servicio->producto_servicio = $request->input('producto_servicio');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->precio = $request->input('precio');
      


        $servicio->save();

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
        $servicio = Servicio::find($id);
        return view('sistema.servicios.editServicio',compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $servicio = Servicio::find($id);
        $servicio->producto_servicio = $request->input('producto_servicio');
        $servicio->descripcion = $request->input('descripcion');   
        $servicio->precio = $request->input('precio');
      

        $servicio->save();

        return back()->with('message','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $servicio = Servicio::find($id);
         $servicio->delete();
         return back();
    }
}
