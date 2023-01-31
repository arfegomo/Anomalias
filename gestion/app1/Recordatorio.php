<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
    protected $table = 'recordatorio';
    protected $fillable = ['fecha','estado'];

    public $timestamps = false;

}
