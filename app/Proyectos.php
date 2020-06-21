<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $fillable = [
        'id', 'nombre', 'descripcion','cliente_id','habilitado'
    ];

    public function cliente() {
        return $this->belongsTo('App\Clientes','cliente_id','id');
    }
}
