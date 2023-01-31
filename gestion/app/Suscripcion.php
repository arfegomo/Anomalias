<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $table = 'suscripciones';
    protected $fillable = ['numeropedido','numerofactura','fechainicio','fechafinal','estado','tiposuscripcion','cantidad','molienda','observacion','correo','nombre'];

    public $timestamps = false;
}