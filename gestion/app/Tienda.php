<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tiendas';
    protected $fillable = ['nombre','idciudad','correo'];

    public $timestamps = false;
}
