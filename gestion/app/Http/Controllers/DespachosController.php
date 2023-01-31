<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Despacho;
use App\Suscripcion;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\DespachoCreado;

class DespachosController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    /*public function despachos()
    {
        $despachos = Despacho::find(id);
        return view('admin.suscripciones.suscripciones',compact("despachos"));
    }*/
    
    public function savedespacho()
    {
       
    }

    /*public function create()
    {
        
    }*/

    public function store(Request $request)
    {
        $this->validate($request,[
        'fechadespacho' => 'required',
        'cantidad' => 'required',
        'idsuscripcion' => 'required',
    ]);
    
    $my_date = new DateTime();

        $despachos = Despacho::create([
                'fechadespacho' => $request->get('fechadespacho'),
                'cantidad' => $request->get('cantidad'),
                'idsuscripcion' => $request->get('idsuscripcion'),
            ]);
            
        $suscripciones = DB::table('suscripciones')
            ->select('suscripciones.id','suscripciones.numeropedido','suscripciones.numerofactura','suscripciones.fechainicio','suscripciones.fechafinal','suscripciones.estado','suscripciones.tiposuscripcion','suscripciones.molienda','suscripciones.cantidad',DB::raw('COUNT(despachos.idsuscripcion) as total'),DB::raw('SUM(despachos.cantidad) as totalibras'))
            ->leftjoin('despachos', 'suscripciones.id', '=', 'despachos.idsuscripcion')
            ->where('suscripciones.id', '=', $request->get('idsuscripcion'))->get();
            
        $despachos = DB::table('despachos')
            ->select('despachos.*')
            ->join('suscripciones', 'despachos.idsuscripcion', '=', 'suscripciones.id') 
            ->where('suscripciones.id', '=', $request->get('idsuscripcion'))
            ->get();
        
        //Mail::to('ariel.fernando@sercafe.com.co')
        //->bcc('gerencia@sercafe.com.co')
        //->bcc('inventarios2@elgualilo.com')
        //->send(new DespachoCreado($suscripciones,$despachos));
        
        
        return redirect()->route('ver-detallesuscripcion',array('id'=>$request->get('idsuscripcion')))->with('message', ' Registro creado correctamente!!!');
    }


    /*public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $anomalias = Anomalia::find($id);
        return view('admin.anomalias.edit',compact('anomalias'));
    }*/

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'estado' => 'required',
        'lote' => 'required'
    ]);
         $despachos = Despacho::find($id);
         
         $despachos->estado = $request->get('estado');
         $despachos->lote = $request->get('lote');

         $despachos->save();
         
         $suscripciones = DB::table('suscripciones')
            ->select('suscripciones.id','suscripciones.correo','suscripciones.numeropedido','suscripciones.numerofactura','suscripciones.fechainicio','suscripciones.fechafinal','suscripciones.estado','suscripciones.tiposuscripcion','suscripciones.molienda','suscripciones.cantidad',DB::raw('COUNT(despachos.idsuscripcion) as total'),DB::raw('SUM(despachos.cantidad) as totalibras'))
            ->leftjoin('despachos', 'suscripciones.id', '=', 'despachos.idsuscripcion')
            ->where('suscripciones.id', '=', $request->get('idsuscripcion'))->get();
            
        $despachos = DB::table('despachos')
            ->select('despachos.*')
            ->join('suscripciones', 'despachos.idsuscripcion', '=', 'suscripciones.id')
            ->where('despachos.estado', '=', 1)
            ->where('suscripciones.id', '=', $request->get('idsuscripcion'))
            ->get();
            
        $emails = ["inventarios2@elgualilo.com", "gerencia@sercafe.com.co", "ariel.fernando@sercafe.com.co", "gestion@sercafe.com.co", $request->get('correo')];
         
         Mail::to($emails)
        //->bcc('gerencia@sercafe.com.co')
        //->bcc('inventarios2@elgualilo.com')
        //->bcc('gestion@sercafe.com.co')
        //->bcc($request->get('correo'))
        ->send(new DespachoCreado($suscripciones,$despachos));
         
        return redirect()->route('ver-detallesuscripcion',array('id'=>$request->get('idsuscripcion')))->with('message', 'Despacho realizado correctamente!!!');
    }

    /*public function destroy($id)
    {
        $anomalias = Anomalia::find($id);
        $anomalias->delete();
        
        return redirect()->route('anomalias.index');
    }*/
}
