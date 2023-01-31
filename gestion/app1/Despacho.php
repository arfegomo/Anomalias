<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    protected $table = 'despachos';
    protected $fillable = ['idsuscripcion','fechadespacho','cantidad','estado'];

    public $timestamps = false;
}