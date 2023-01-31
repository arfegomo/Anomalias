<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Support\Facades\DB;

class DespachoCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $despachos;
    public $suscripciones;

    public function __construct($suscripciones,$despachos)
    {
        $this->suscripciones = $suscripciones;
        $this->despachos = $despachos;
        
    }

    public function build()
    {
        return $this->from('tickets2@elgualilo.com')
                    ->subject('Se ha realizado un nuevo despacho!')



                    ->view('mails.despacho');
    }
}