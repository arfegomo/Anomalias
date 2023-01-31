<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


use App\Mail\ProximoDespacho;


public function handle()

{


        $despachos = DB::table('despachos')
            ->select('suscripciones.tiposuscripcion','despachos.id','despachos.idsuscripcion','suscripciones.numeropedido','suscripciones.numerofactura','suscripciones.cantidad',DB::raw('DATE_ADD(MAX(despachos.fechadespacho), INTERVAL 1 month) as fecha'),DB::raw('MAX(despachos.fechadespacho) as ultimaves'),DB::raw('COUNT(despachos.idsuscripcion) as total'))
            ->join('suscripciones', 'despachos.idsuscripcion', '=', 'suscripciones.id') 
            ->where('suscripciones.estado', '=', 1)
            ->groupBy('suscripciones.id')->get();
            
        Mail::to('ariel.fernando@sercafe.com.co')
        ->bcc('gerencia@sercafe.com.co')
        ->send(new ProximoDespacho($despachos));
            
 
        return view('admin.suscripciones.ver-despachos',compact("despachos"));

}

?>

