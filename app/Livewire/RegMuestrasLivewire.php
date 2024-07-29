<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Muestra;
use Livewire\Component;
use App\Models\RegMuestra; // Asegúrate de importar el modelo correcto
use App\Models\Parametro;
use App\Models\ParametroF;
use App\Models\Sede;

class RegMuestrasLivewire extends Component
{
    public $datos = [];
    public $parametrosMicro = [];
    public $datosMuestras = [];
    public $parametrosFisico = [];
    public $parametrosMicroSeleccionados = [];
    public $parametrosFisicoSeleccionados = [];
    public $mostrarDiv = false;



    // ELEMENTOS DEL INPUT DEL CLIENTE
    public $consecutivo = "";
    public $sede = "";
    public $responsable = "";
    public $cargo = "";
    public $cedula = "";
    public $telefono = "";
    public $correo = "";
    public $sedes;
    public $clientes;


    //ELEMENTOS DE LA MUESTRA
    public $tipoMuestra;
    public $descripcion;
    public $temperatura;
    public $lote;
    public $registroinvima;
    public $fechaVencimiento;
    public $observacion;

 //Tipo de muestras
 public $tipoMuestras;

//Id del registro de muestra
public $idNuevoRegistro="";
    public function mount()
    {
        // Consulta los registros de la tabla
        $this->parametrosMicro = Parametro::all();

        // Consulta los registros de la tabla
        $this->parametrosFisico = ParametroF::all();

        // Consulta de los tipos de muestras
        $tmuestras = Muestra::all();
        $this->tipoMuestras = $tmuestras;

        //Listamos todas las sedes
        $clientes = Client::all();
        $this->clientes = $clientes;

        //Listamos todas las sedes
        $sedes = Sede::all();
        $this->sedes = $sedes;

    }

    public function guardarDatosMuestras($id)
    {

        // Crear un nuevo array asociativo con los datos del formulario
        $nuevoDato = [

            'tipoMuestra' => $this->tipoMuestra,
            'descripcion' => $this->descripcion,
            'temperatura' => $this->temperatura,
            'lote' => $this->lote,
            'registroinvima' => $this->registroinvima,
            'fechaVencimiento' => $this->fechaVencimiento,
            'observacion' => $this->observacion,
        ];

        // Convertir el array de datos a formato JSON
        $parametrosSeleccionadosString = json_encode($nuevoDato);



        $datosmuestras = RegMuestra::find($id);
        $datosmuestras->datosmuestras =  $parametrosSeleccionadosString;


        $datosmuestras->save();



        return back()->with('messageCliente','Registro Exitoso!');



    }
    public function guardarDatosCliente()
    {

        // Crear un nuevo array asociativo con los datos del formulario
        $nuevoDato = [

            'sede' => $this->sede,
            'responsable' => $this->responsable,
            'cargo' => $this->cargo,
            'cedula' => $this->cedula,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
        ];

        // Convertir el array de datos a formato JSON
        $parametrosSeleccionadosString = json_encode($nuevoDato);




        // Crear un nuevo registro en la tabla con el campo cliente
        $regMuestra = RegMuestra::create([
            'cliente' => $parametrosSeleccionadosString,
        ]);

           // Obtener el ID del registro recién creado
         $this->idNuevoRegistro = $regMuestra->id;

             // Limpiar el array después de guardar
            // $this->reset('parametrosSeleccionados');

             $this->mostrarDiv = true;

             return back()->with('messageCliente','Registro Exitoso!');



    }


    public function guardarParametrosMicro($id)

    {

        $parametrosSeleccionadosString = json_encode($this->parametrosMicroSeleccionados);

        $parametroM = RegMuestra::find($id);
        $parametroM->parametrosM =  $parametrosSeleccionadosString;


        $parametroM->save();

          // Limpiar el array después de guardar
          //$this->reset('parametrosSeleccionados');

          $this->mostrarDiv = true;

        return back()->with('messageMicro','Actualizado Correctamente');

    }
    public function guardarParametrosFisico($id)

    {

        $parametrosSeleccionadosString = json_encode($this->parametrosFisicoSeleccionados);

        $parametroF = RegMuestra::find($id);
        $parametroF->parametrosF =  $parametrosSeleccionadosString;


        $parametroF->save();

          // Limpiar el array después de guardar
         // $this->reset('parametrosFisicoSeleccionados');

        return back()->with('messageFisico','Actualizado Correctamente');

    }

    public function render()
    {



        return view('livewire.reg-muestras-livewire', [
            'parametrosMicro' => $this->parametrosMicro,
            'parametrosFisico' => $this->parametrosFisico,



        ]);
    }
}
