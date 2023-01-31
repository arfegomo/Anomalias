<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anomalia extends Model
{
    protected $table = 'anomalias';
    protected $fillable = ['nombre'];

    public $timestamps = false;
}
