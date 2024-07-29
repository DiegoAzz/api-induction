<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

Route::get('/clientes', [ApiController::class, 'getClientes']);
Route::get('/servicios', [ApiController::class, 'getServicios']);
Route::get('/promociones', [ApiController::class, 'getPromociones']);
