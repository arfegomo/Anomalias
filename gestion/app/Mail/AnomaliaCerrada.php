<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Support\Facades\DB;

class AnomaliaCerrada extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $evaluaciones;

    public function __construct($id,$evaluaciones)
    {
        $this->id = $id;
        $this->evaluaciones = $evaluaciones;
    }

    public function build()
    {
        return $this->from('tickets2@elgualilo.com')
                    ->subject('Se ha cerrado un caso de anomalías!')



                    ->view('mails.cierreanomalia');
    }
}
