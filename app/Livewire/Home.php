<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Metodo;
use App\Models\Muestra;
use App\Models\Parametro;
use App\Models\Sede;
use App\Models\Unidades;
use Livewire\Component;

class Home extends Component
{/* 
    public $clientes  = 0;
    public $tipoMuestras  = 0;
    public $parametroM  = 0;
    public $parametroF  = 0;
    public $sedes  = 0;
    public $metodos  = 0;
    public $unidades  = 0;
  
public function mount(){

//TOTAL DE CLIENTES
$cl = Client::count();
$this->clientes = $cl;

//TOTAL TIPO MUESTRAS
$tm = Muestra::count();
$this->tipoMuestras = $tm;

//TOTAL PARAMETROS MICROBIOLOGICO
$pm = Parametro::count();
$this->parametroM = $pm;

//TOTAL PARAMETROS FISICOQUIMICO
$pf = Parametro::count();
$this->parametroF = $pf;

//TOTAL SEDES
$s = Sede::count();
$this->sedes = $s;

//TOTAL MUESTRAS
/* $s = Sede::count();
$this->sedes = $s; */


//TOTAL METODOS
/* $m = Metodo::count();
$this->metodos = $m; */

//TOTAL UNIDADES
/* $u = Unidades::count();
$this->unidades = $u; */ 


  
    public function render()
    {
        return view('livewire.home');
    }
}
