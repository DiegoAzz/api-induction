<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {   
        $empleados = Empleado::count();
        return view('sistema.empleados.addEmpleado',compact('empleados'));
    }
}
