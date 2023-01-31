<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = ['nombre','nit','direccion','telefono','contacto'];

    public $timestamps = false;

}
