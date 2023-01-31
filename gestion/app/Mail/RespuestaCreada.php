<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RespuestaCreada extends Mailable
{
    use Queueable, SerializesModels;

    public $respuestas;
    public $evaluaciones;

    public function __construct($respuestas,$evaluaciones)
    {
        $this->respuestas = $respuestas;
        $this->evaluaciones = $evaluaciones;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tickets2@elgualilo.com')
                    ->subject('Se ha creado una nueva respuesta para la anomalía!')
                    ->view('mails.respuesta');
    }
}
