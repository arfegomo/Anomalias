<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTienda extends Model
{
    protected $table = 'userstiendas';
    protected $fillable = ['idtienda','iduser'];

    public $timestamps = false;
}
