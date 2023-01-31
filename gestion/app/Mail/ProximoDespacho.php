<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Support\Facades\DB;

class ProximoDespacho extends Mailable
{
    use Queueable, SerializesModels;

    public $despachos;

    public function __construct($despachos)
    {

        $this->despachos = $despachos;
        
    }

    public function build()
    {
        return $this->from('tickets2@elgualilo.com')
                    ->subject('Recordatorio de proximos despachos!')



                    ->view('mails.ver-despachos');
    }
}