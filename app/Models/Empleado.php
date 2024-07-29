<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'cargo', 'funciones', 'imagen'];

    public function dependencias()
    {
        return $this->belongsToMany(Dependencia::class, 'empleado_dependencia', 'empleado_id', 'dependencia_id');
    }
}
