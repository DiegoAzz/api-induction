<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Servicio;
use App\Models\Promocion;
use App\Models\Empleado;

class ApiController extends Controller
{
    public function getClientes()
    {
        return response()->json(Client::all());
    }

    public function getServicios()
    {
        return response()->json(Servicio::all());
    }

    public function getPromociones()
    {
        return response()->json(Promocion::all());
    }



public function getEmpleados()
{
    $empleados = Empleado::all()->map(function ($empleado) {
        $empleado->imagen_url = $empleado->imagen
            ? asset('storage/' . $empleado->imagen)
            : null;
        return $empleado;
    });

    return response()->json($empleados);
}

}
