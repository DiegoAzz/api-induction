<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Servicio;
use App\Models\Promocion;

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
}
