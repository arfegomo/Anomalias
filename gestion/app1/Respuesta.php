<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuestas';
    protected $fillable = ['idformulario','responsable','respuesta'];

    //public $timestamps = false;

    public function formulario()
    {
        return $this->belongsTo('App\Formulario','idformulario');
    }
}
