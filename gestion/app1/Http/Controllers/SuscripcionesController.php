<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;
use App\Suscripcion;
use App\Despacho;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\SuscripcionCreada;
use App\Mail\ProximoDespacho;

class SuscripcionesController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function suscripciones()
    {
        //$suscripciones = Suscripcion::all();
        $suscripciones = DB::table('suscripciones')
            ->select('suscripciones.id','suscripciones.numeropedido','suscripciones.numerofactura','suscripciones.fechainicio','suscripciones.fechafinal','suscripciones.estado','suscripciones.tiposuscripcion',DB::raw('COUNT(despachos.idsuscripcion) as total'))
            ->leftjoin('despachos', 'suscripciones.id', '=', 'despachos.idsuscripcion')
            ->groupBy('suscripciones.id')->get();
        return view('admin.suscripciones.suscripciones',compact("suscripciones"));
    }

    public function create()
    {
        return view('admin.suscripciones.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'numeropedido' => 'required|unique:suscripciones|max:255',
        'numerofactura' => 'required|unique:suscripciones|max:255',
        'fechainicio' => 'required',
        'fechafinal' => 'required',
        'estado' => 'required',
        'tiposuscripcion' => 'required',
        'cantidad' => 'required',
        'molienda' => 'required',
        'correo' => 'required'
    ]);

        $suscripciones = Suscripcion::create([
                'numeropedido' => $request->get('numeropedido'),
                'numerofactura' => $request->get('numerofactura'),
                'fechainicio' => $request->get('fechainicio'),
                'fechafinal' => $request->get('fechafinal'),
                'estado' => $request->get('estado'),
                'tiposuscripcion' => $request->get('tiposuscripcion'),
                'cantidad' => $request->get('cantidad'),
                'molienda' => $request->get('molienda'),
                'correo' => $request->get('correo')
            ]);
            
        $suscripciones = $suscripciones->id;
            
        $suscripciones = DB::table('suscripciones')
            ->select('suscripciones.id','suscripciones.numeropedido','suscripciones.numerofactura','suscripciones.fechainicio','suscripciones.fechafinal','suscripciones.estado','suscripciones.tiposuscripcion','suscripciones.molienda','suscripciones.cantidad',DB::raw('COUNT(despachos.idsuscripcion) as total'))
            ->leftjoin('despachos', 'suscripciones.id', '=', 'despachos.idsuscripcion')
            ->where('suscripciones.id', '=', $suscripciones)->get();
            
        $emails = ["inventarios2@elgualilo.com", "gerencia@sercafe.com.co", "ariel.fernando@sercafe.com.co", "gestion@sercafe.com.co"];
            
        Mail::to($emails)
        //->bcc('gerencia@sercafe.com.co')
        //->bcc('inventarios2@elgualilo.com')
        ->send(new SuscripcionCreada($suscripciones));
        
        return redirect()->route('suscripciones');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $detallesuscripcion = Suscripcion::find($id);
        
        $totaldespachos = DB::table('despachos')
            ->select(DB::raw('COUNT(despachos.idsuscripcion) as total'))
            ->rightjoin('suscripciones', 'despachos.idsuscripcion', '=', 'suscripciones.id') 
            ->where('suscripciones.id', '=', $id)
            ->get();
        
        $despachos = DB::table('despachos')
            ->select('despachos.*')
            ->join('suscripciones', 'despachos.idsuscripcion', '=', 'suscripciones.id') 
            ->where('suscripciones.id', '=', $id)
            ->get();
            
        $fechas = DB::table('despachos')
            ->select(DB::raw('DATE_ADD(MAX(despachos.fechadespacho), INTERVAL 1 month) as fecha'))
            ->join('suscripciones', 'despachos.idsuscripcion', '=', 'suscripciones.id') 
            ->where('suscripciones.id', '=', $id)
            ->get();
            
        
        
    $primerdespacho = date('d-m-Y', strtotime('next thursday'));
        
    foreach($fechas as $fecha){
    
    $next = $fecha->fecha;

    }
        
    $siguientedespacho = date('d-m-Y', strtotime($next. 'last thursday'));

            
        return view('admin.suscripciones.ver-detallesuscripcion',compact("detallesuscripcion","despachos","fechas","primerdespacho","siguientedespacho","totaldespachos"));
    }
    
    public function despachos()
   
    {
        $detallesuscripcion = Suscripcion::all();
        
        $despachos = DB::table('despachos')
            ->select('suscripciones.tiposuscripcion','despachos.id','suscripciones.observacion','despachos.idsuscripcion','suscripciones.numeropedido','suscripciones.numerofactura','despachos.cantidad',DB::raw('DATE_ADD(MAX(despachos.fechadespacho), INTERVAL 1 month) as fecha'),DB::raw('MIN(despachos.fechadespacho) as proximo'),DB::raw('COUNT(despachos.idsuscripcion) as total'))
            ->rightjoin('suscripciones', 'despachos.idsuscripcion', '=', 'suscripciones.id') 
            ->where('suscripciones.estado', '=', 1)
            ->where('despachos.estado', '=', 0)
            ->groupBy('suscripciones.id')->get();
            
        $emails = ["inventarios2@elgualilo.com", "gerencia@sercafe.com.co", "ariel.fernando@sercafe.com.co", "gestion@sercafe.com.co"];
            
        Mail::to($emails)
        //->bcc('gerencia@sercafe.com.co')
        //->cc('ariel.fernando@sercafe.com.co')
        //->cc('inventarios2@elgualilo.com')
        //->cc('gestion@sercafe.com.co')
        ->send(new ProximoDespacho($despachos));
            
 
        return view('admin.suscripciones.ver-despachos',compact("despachos"));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'estado' => 'required:suscripciones|max:255'
    ]);
         $suscripciones = Suscripcion::find($id);
         
         $suscripciones->estado = $request->get('estado');

         $suscripciones->save();
         
        return redirect()->route('ver-detallesuscripcion',array('id'=>$id))->with('message', 'Suscripcion cerrada correctamente!!!');
    }

    /*public function destroy($id)
    {
        $anomalias = Anomalia::find($id);
        $anomalias->delete();
        
        return redirect()->route('anomalias.index');
    }*/
}
