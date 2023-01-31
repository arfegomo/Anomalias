<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleAnomalia extends Model
{
    protected $table = 'detallesanomalias';
    protected $fillable = ['idanomalia','idformulario'];

    public $timestamps = false;
}
