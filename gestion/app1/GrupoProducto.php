<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoProducto extends Model
{
    protected $table = 'gruposproductos';
    protected $fillable = ['nombre'];

    public $timestamps = false;


    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
