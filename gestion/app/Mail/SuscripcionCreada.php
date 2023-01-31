<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Support\Facades\DB;

class SuscripcionCreada extends Mailable
{
    use Queueable, SerializesModels;

    public $suscripciones;

    public function __construct($suscripciones)
    {
        $this->suscripciones = $suscripciones;
    }

    public function build()
    {
        return $this->from('tickets2@elgualilo.com')
                    ->subject('Se ha creado una nueva suscripcion!')



                    ->view('mails.suscripcion');
    }
}
