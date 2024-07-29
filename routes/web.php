<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\MetodoController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\RegMuestraController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\ParametroFController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\Home;
use App\Models\Servicio;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/parametro',ParametroController::class)->names('parametro');//PARAMETROS MICRO
    Route::resource('/parametroF',ParametroFController::class)->names('parametroF');//PARAMETROS FISICO
    Route::resource('/client',ClienteController::class)->names('cliente');//CLIENTES
    Route::resource('/sede',SedeController::class)->names('sede');//SEDES
    Route::resource('/metodo',MetodoController::class)->names('metodo');//METODOS
    Route::resource('/unidades',UnidadesController::class)->names('unidades');//UNIDADES
    Route::resource('/muestra',MuestraController::class)->names('muestra');//TIPO MUESTRAS
    Route::resource('/regMuestra',RegMuestraController::class)->names('regMuestra');// MUESTRAS
    Route::resource('/roles',RoleController::class)->names('roles');//ROLES
    Route::resource('/permisos',PermisoController::class)->names('permisos');//PERMISOS
    Route::resource('/usuarios',AsignarController::class)->names('asignar');//PERMISOS
    Route::resource('/servicio',ServicioController::class)->names('servicio');//SERVICIOS
    Route::resource('/servicio',ServicioController::class)->names('servicio');//SERVICIOS
    Route::resource('empresa', EmpresaController::class)->names('empresa');//EMPRESA
    //Route::get('/home',[Home::class,'index'])->name('home');//HOME
});
