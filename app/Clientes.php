<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'id', 'nombre', 'rut','habilitado'
    ];

    
    public function proyectos() {
        return $this->hasMany('App\Proyectos');
    }
}
