<?php

namespace App\Livewire;

use App\Models\Parametro;
use App\Models\RegMuestra; // Asegúrate de importar el modelo correcto
use Livewire\Component;

class ListarChecksParametrosM extends Component
{
    public $parametrosMicro = [];
    public $parametrosSeleccionados = [];

    public $idNuevoRegistro;

    public function mount()
    {
        // Consulta los registros de la tabla
        $this->parametrosMicro = Parametro::all();
        // Obtener el ID almacenado en la variable global de sesión
        $this->idNuevoRegistro = session('idNuevoRegistro');
    }

    public function guardar()
    {

        $parametrosSeleccionadosString = json_encode($this->parametrosSeleccionados);

        // Crear el registro en la base de datos
        RegMuestra::create([
            'parametrosM' => $parametrosSeleccionadosString,
        ]);

        // Limpiar el array después de guardar
        $this->reset('parametrosSeleccionados');

        // Enviar un mensaje de éxito (opcional)
        session()->flash('message', 'Parámetros guardados exitosamente.');
    }


    public function render()
    {
        return view('livewire.listar-checks-parametros-m', [
            'parametrosMicro' => $this->parametrosMicro,
        ]);
    }
}
