<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'imagen'];

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_dependencia', 'dependencia_id', 'empleado_id');
    }
}
