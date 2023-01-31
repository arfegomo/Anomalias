<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','idgrupo'];

    public $timestamps = false;

    public function grupoproducto()
    {
        return $this->belongsTo('App\GrupoProducto','idgrupo');
    }
}
