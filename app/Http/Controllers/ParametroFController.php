<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParametroF;


class ParametroFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parametrosF = ParametroF::all();
        return view('sistema.parametros.listParametrosF',compact('parametrosF'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistema.parametros.addFisico');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'parametroF' => 'required',       

        ]);

        $parametroF = new ParametroF();
        $parametroF->parametroF = $request->input('parametroF');    

        $parametroF->save();

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
        $parametroF = ParametroF::find($id);
        return view('sistema.parametros.editParametroF',compact('parametroF'));
    }

    public function update(Request $request, string $id)
    {
        $parametroF = ParametroF::find($id);

        $parametroF->parametroF = $request->input('parametroF');
       

        $parametroF->save();

        return back()->with('message','Actualizado Correctamente');
    }

    public function destroy(string $id)
    {
        $parametroF = ParametroF::find($id);
        $parametroF->delete();
        return back();
    }
}
