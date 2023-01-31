<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Support\Facades\DB;

class AnomaliaCreada extends Mailable
{
    use Queueable, SerializesModels;

    public $formularios;
    public $evaluaciones;

    public function __construct($formularios,$evaluaciones)
    {
        $this->formularios = $formularios;
        $this->evaluaciones = $evaluaciones;
    }

    public function build()
    {
        return $this->from('tickets2@elgualilo.com')
                    ->subject('Se ha creado una nueva anomalía!')



                    ->view('mails.anomalia');
    }
}
