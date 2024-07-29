<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sedes():HasMany
    {
        return $this->hasMany(Sede::class,'cliente_id','id');
    }
}
