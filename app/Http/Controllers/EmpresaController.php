<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Dependencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        $dependencias = Dependencia::all();

        return view('sistema.empleados.listEmpleado', compact('empleados', 'dependencias'));
    }

    public function create()
    {
        return view('sistema.empleados.addEmpleado');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'cargo' => 'required|string|max:75',
            'funciones' => 'required|string|max:75',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $empleado = new Empleado();
        $empleado->nombre = $request->input('nombre');
        $empleado->cargo = $request->input('cargo');
        $empleado->funciones = $request->input('funciones');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('imagenes', $nombreImagen, 'public');
            $empleado->imagen = $rutaImagen;
        }

        $empleado->save();

        return back()->with('message', 'ok');
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        $dependencias = $empleado->dependencias;

        return view('empresa.show', compact('empleado', 'dependencias'));
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);

        return view('sistema.empleados.editEmpleado', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'cargo' => 'required|string',
            'funciones' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request->input('nombre');
        $empleado->cargo = $request->input('cargo');
        $empleado->funciones = $request->input('funciones');

        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($empleado->imagen && Storage::disk('public')->exists($empleado->imagen)) {
                Storage::disk('public')->delete($empleado->imagen);
            }

            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('imagenes', $nombreImagen, 'public');
            $empleado->imagen = $rutaImagen;
        }

        $empleado->save();

        return redirect()->route('empresa.index')->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);

        if ($empleado->imagen && Storage::disk('public')->exists($empleado->imagen)) {
            Storage::disk('public')->delete($empleado->imagen);
        }

        $empleado->delete();

        return redirect()->route('empresa.index')->with('success', 'Empleado eliminado correctamente');
    }
}
