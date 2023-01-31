<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $table = 'formularios';
    protected $fillable = ['idproducto','idproveedor','idtienda','observacion','promotora','lote','fechavencimiento','momento','estado'];

    public $timestamps = true;

    public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }
}
