<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoGrupo extends Model
{
    protected $table = 'tiposgrupos';
    protected $fillable = ['nombre'];

    public $timestamps = false;
}
