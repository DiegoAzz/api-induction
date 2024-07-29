<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Dependencia;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        $dependencias = Dependencia::all();

        return view('empresa.index', compact('empleados', 'dependencias'));
    }

    public function create()
    {
        // No se necesita implementar para este ejemplo
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string',
            'cargo' => 'required|string',
            'funciones' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Guardar el empleado en la base de datos
        $empleado = new Empleado([
            'nombre' => $request->input('nombre'),
            'cargo' => $request->input('cargo'),
            'funciones' => $request->input('funciones'),
        ]);

        // Procesar la imagen si se ha proporcionado
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('imagenes', $nombreImagen, 'public');
            $empleado->imagen = $rutaImagen;
        }

        $empleado->save();

        return redirect()->route('empresa.index')->with('success', 'Empleado creado correctamente');
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

        return view('empresa.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
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

        // Procesar la nueva imagen si se ha proporcionado
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($empleado->imagen) {
               //Storage::disk('public')->delete($empleado->imagen);
            }

            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('imagenes', $nombreImagen, 'public');
            $empleado->imagen = $rutaImagen;
        }

        $empleado->save();

        return redirect()->route('empresa.show', $empleado->id)->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($empleado->imagen) {
          //  Storage::disk('public')->delete($empleado->imagen);
        }

        $empleado->delete();

        return redirect()->route('empresa.index')->with('success', 'Empleado eliminado correctamente');
    }
}
