<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use DateTime;
use App\Mail\AnomaliaCreada;
use App\Mail\AnomaliaCerrada;
use App\Tienda;
use App\GrupoProducto;
use App\Producto;
use App\Proveedor;
use App\Formulario;
use App\DetalleAnomalia;
use App\Respuesta;
use App\TipoGrupo;
use App\Area;
use App\Despacho;
use App\Suscripcion;
use App\Mail\ProximoDespacho;


class FormulariosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function formatoConsignacion()
    {
        return view('admin.formularios.formatoconsignacion');   
    }

    public function formatoBPM()
    {
        return view('admin.formularios.formatobpm');   
    }

    public function formato1()
    {
        return view('admin.formularios.formato-1');   
    }

    public function formato2()
    {
        return view('admin.formularios.formato-2');   
    }

    public function formato3()
    {
        return view('admin.formularios.formato-3');   
    }

    public function aumentoSeguidores()
    {
        return view('admin.formularios.aumentos-seguidores');   
    }

    public function formato4()
    {
        return view('admin.formularios.formato-4');   
    }

    public function formato5()
    {
        return view('admin.formularios.formato-5');   
    }

    public function formato6()
    {
        return view('admin.formularios.formato-6');   
    }

    public function formato7()
    {
        return view('admin.formularios.formato-7');   
    }
    
    public function formato8()
    {
        return view('admin.formularios.formato-8');   
    }
    
    public function formato9()
    {
        return view('admin.formularios.formato-9');   
    }
    
    public function formato10()
    {
        return view('admin.formularios.formato-10');   
    }
    
    public function formato11()
    {
        return view('admin.formularios.formato-11');   
    }
    
    public function descuento_empleado()
    {
        return view('admin.formularios.descuento-empleados');   
    }

    public function descarga_nomina()
    {
        return view('admin.formularios.manuales-nomina');   
    }
    
    public function formato12()
    {
        return view('admin.formularios.formato-12');   
    }
    
    public function formatosMercadeo()
    {
        return view('admin.formularios.formatosmercadeo');
    }

    public function FacturaElectronica()
    {
        return view('admin.formularios.facturaelectronica');
    }
    
    public function manuales()
    {
        return view('admin.formularios.manuales');   
    }

    public function rutas()
    {
        $despachos = DB::table('despachos')
            ->select('suscripciones.tiposuscripcion','despachos.id','suscripciones.observacion','despachos.idsuscripcion','suscripciones.numeropedido','suscripciones.numerofactura','despachos.cantidad',DB::raw('DATE_ADD(MAX(despachos.fechadespacho), INTERVAL 1 month) as fecha'),DB::raw('MIN(despachos.fechadespacho) as proximo'),DB::raw('COUNT(despachos.idsuscripcion) as total'))
            ->rightjoin('suscripciones', 'despachos.idsuscripcion', '=', 'suscripciones.id') 
            ->where('suscripciones.estado', '=', 1)
            ->where('despachos.estado', '=', 0)
            ->groupBy('suscripciones.id')->get();
            
        
        $dia = date('w');
        
        $recordatorio = DB::table('recordatorio')
            ->select(DB::raw('COUNT(recordatorio.fecha) as total'))
            ->where('recordatorio.fecha', '=', date('Y-m-d'))->first()->total;
            
        
        if((($dia == 1) || ($dia == 3)) && ($recordatorio < 1)){
            
        DB::table('recordatorio')->insert(['fecha' => date('Y-m-d'), 'estado' => 1]);    
        
        $emails = ["inventarios2@elgualilo.com", "gerencia@sercafe.com.co", "ariel.fernando@sercafe.com.co", "gestion@sercafe.com.co"];
        
        Mail::to($emails)
        //->bcc('gerencia@sercafe.com.co')
        //->bcc('inventarios2@elgualilo.com')
        //->bcc('gestion@sercafe.com.co')
        ->send(new ProximoDespacho($despachos));
        
        
        }
        return view('admin.formularios.rutas');
    }

    public function informes()
    {
        return view('admin.formularios.informes');
    }

    public function Covid19()
    {
        return view('admin.formularios.covid19');
    }
    
    public function Covid19terrazacafe()
    {
        return view('admin.formularios.covid-19-terrazacafe');
    }
    
    public function prima()
    {
        return view('admin.formularios.prima');
    }

    public function getProductos(Request $request)
    {
        if($request->ajax()){
            
            $productos = Producto::orderBy('nombre','asc')
            ->where('idgrupo', $request->grupo)
            ->select('id','nombre')
            ->get();

            //return $productos;

            //$productos = array('ariel' => 5 );

            foreach ($productos as $producto) {
                $productoArray[$producto->id] = $producto->nombre;
            }
            
            return response()->json($productoArray);
        }
    }

    public function getProveedores(Request $request)
    {
        if($request->ajax()){

            $proveedores = DB::table('productosproveedores')
            ->join('proveedores', 'productosproveedores.idproveedor', '=', 'proveedores.id')
            ->join('productos', 'productosproveedores.idproducto', '=', 'productos.id')
            ->select('proveedores.id','proveedores.nombre')
            ->where('productosproveedores.idproducto', '=', $request->proveedor)->get();


            foreach ($proveedores as $proveedor) {
               $proveedorArray[$proveedor->id] = $proveedor->nombre;
            }
            return response()->json($proveedorArray);
        }
    }

    public function ProveedoresConsolidado(Request $request)
    {
        $my_date = new DateTime();

        if($request->ajax()){

            $proveedores = DB::table('formularios')
            ->join('proveedores', 'proveedores.id', '=', 'formularios.idproveedor')
            ->select('proveedores.nombre',DB::raw('YEAR(formularios.created_at) year, MONTH(formularios.created_at) month'),DB::raw('COUNT(formularios.id) as total'))
            ->where('formularios.created_at', '<=', $my_date->format('Y-m-d'))
            ->where('proveedores.id','=', $request->proveedor)
            ->groupby('year','month')->get();


            foreach ($proveedores as $proveedor) {
               $proveedorArray['nombre'] = $proveedor->nombre;
               $proveedorArray['fecha'] = $proveedor->month."/".$proveedor->year;
               $proveedorArray['total'] = $proveedor->total;
            }
            return response()->json($proveedorArray);
        }
    }

    public function getAnomalias(Request $request)
    {

            $anomalias = DB::table('anomaliasgruposproductos')
            ->join('anomalias', 'anomaliasgruposproductos.idanomalias', '=', 'anomalias.id')
            ->join('gruposproductos', 'anomaliasgruposproductos.idgruposproductos', '=', 'gruposproductos.id')
            ->select('anomalias.id','anomalias.nombre')
            ->where('anomaliasgruposproductos.idgruposproductos', '=', $request->grupo)->get();

            foreach ($anomalias as $anomalia) {
               $anomaliaArray[$anomalia->id] = $anomalia->nombre;
            }
            return response()->json($anomaliaArray);

    }

    public function calidad($id)
    {
        $tiendas = Tienda::pluck('nombre', 'id');
        //$gruposproductos = GrupoProducto::pluck('nombre', 'id');
        $gruposproductos = GrupoProducto::where('idtipogrupo',$id)->get()->pluck('nombre', 'id');
        return view('admin.formularios.calidadproducto',compact('tiendas','gruposproductos'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'productos' => 'required:productos',
        'proveedores' => 'required:proveedores',
        'idtienda' => 'required:tiendas',
        'observacion' => 'required:formularios',
        'promotora' => 'required:formularios',
        'lote' => 'required:formularios',
        'fechavencimiento' => 'required:formularios',
        'momento' => 'required:formularios',
        'idgrupo' => 'required:gruposproductos',
        'anomalias' => 'required:detallesanomalias',
        'tipoincidente' => 'required:formularios'



    ]);
                    /*$imagen = $request->file("imagen");
                    $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
                    $ruta = public_path("img/");

                    //$imagen->move($ruta,$nombreimagen);
                    copy($imagen->getRealPath(),$ruta.$nombreimagen);*/


        $formularios = Formulario::create([
                'idproducto' => $request->get('productos'),
                'idproveedor' => $request->get('proveedores'),
                'idtienda' => $request->get('idtienda'),
                'observacion' => $request->get('observacion'),
                'promotora' => $request->get('promotora'),
                'lote' => $request->get('lote'),
                'fechavencimiento' => $request->get('fechavencimiento'),
                'momento' => $request->get('momento'),
                'tipoincidente' => $request->get('tipoincidente'),
                'fechaidentificacion' => $request->get('fechaidentificacion'),
                'lugaridentificado' => $request->get('lugaridentificado'),
                'fecharecepcion' => $request->get('fecharecepcion'),
                'cantidad' => $request->get('cantidad'),
                

                //if($request->hasFile("imagen")){

                    
                'imagen' => $request->get('imagen')
            
                                                  //  }
            ]);

        $formularios = $formularios->id;
        $datas = $request->get('anomalias');

        foreach ($datas as $key => $value) {
        	$detallesanomalias = DetalleAnomalia::create([
        			'idanomalia' => $value,
        			'idformulario' => ($formularios)
        
            ]);

        }

        $destino = DB::table('users')
            ->join('userstiendas', 'userstiendas.iduser', '=', 'users.id') 
            ->join('tiendas', 'tiendas.id', '=', 'userstiendas.idtienda') 
            ->where('tiendas.id','=', $request->get('idtienda'))
            ->where('users.id','!=', 38)
            ->where('users.id','!=', 45)
            ->where('users.id','!=', 46)
            ->where('users.id','!=', 47)
            ->select('users.email')
            ->get();

        $evaluaciones = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->select('productos.nombre as nombre_producto','formularios.id','tiendas.nombre as nombre_tienda','formularios.created_at','formularios.estado')

            ->where('formularios.id', '=', $formularios)->get();

        //return $destino;    
        Mail::to($destino)->send(new AnomaliaCreada($formularios,$evaluaciones));
        //return dd($datas);

        return redirect()->route('ver-grupoevaluacion-all')->with('message', 'Evaluación guardada correctamente!!!');
    }

    public function loadEvaluacion()
    {
        $gruposproductos = GrupoProducto::all();
        return view('admin.formularios.list',compact('gruposproductos'));
    }

    public function videotutoriales()
    {

        return view('admin.formularios.videotutoriales');
    }

    public function porGrupos()
    {
        return view('admin.formularios.porgrupos');
    }

    public function informeporGrupos(Request $request)
    {

    setlocale(LC_TIME, "In_IN");
    $mes = strftime("%B,",strtotime($request->get('fecha')));
    $ano = strftime("%Y,",strtotime($request->get('fecha')));

    $my_date = new DateTime();
 
    $my_date->modify('first day of '.$mes.' '.$ano.'');
    $inicio = $my_date->format('Y-m-d');

    $my_date->modify('last day of '.$mes.' '.$ano.'');
    $fin = $my_date->format('Y-m-d');
         
         $porgrupos = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->select('gruposproductos.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->orderBy('total', 'DESC')
            ->groupBy('gruposproductos.id')->get();

         //return $porgrupos;
         
        return view('admin.formularios.informegrupos',array('porgrupos' => $porgrupos));


    }

    public function porProductos()
    {
        return view('admin.formularios.porproductos');
    }

    public function informeporProductos(Request $request)
    {

    setlocale(LC_TIME, "In_IN");
    $mes = strftime("%B,",strtotime($request->get('fecha')));
    $ano = strftime("%Y,",strtotime($request->get('fecha')));

    $my_date = new DateTime();
 
    $my_date->modify('first day of '.$mes.' '.$ano.'');
    $inicio = $my_date->format('Y-m-d');

    $my_date->modify('last day of '.$mes.' '.$ano.'');
    $fin = $my_date->format('Y-m-d');
         
         $porproductos = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->select('productos.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->orderBy('total', 'DESC')
            ->groupBy('productos.id')->get();

         //return $porproductos;
         
        return view('admin.formularios.informeproductos',array('porproductos' => $porproductos));
    }

    public function porAnomalias()
    {
        return view('admin.formularios.poranomalias');
    }
    
    public function porresumen()
    {
        return view('admin.formularios.resumen');
    }
    
    public function informeResumen(Request $request)
    {

    setlocale(LC_TIME, "In_IN");
    $mes = strftime("%B,",strtotime($request->get('fecha')));
    $ano = strftime("%Y,",strtotime($request->get('fecha')));

    $my_date = new DateTime();
 
    $my_date->modify('first day of '.$mes.' '.$ano.'');
    $inicio = $my_date->format('Y-m-d');

    $my_date->modify('last day of '.$mes.' '.$ano.'');
    $fin = $my_date->format('Y-m-d');

    $fechas = array(['inicio' => $inicio, 'fin' => $fin, 'estado' => $request->get('estado')]);
         

         $poranomalias = DB::table('formularios')
            ->select('formularios.id','formularios.estado','formularios.created_at','tiendas.nombre as tienda','gruposproductos.nombre as grupo','productos.nombre as producto','ciudades.nombre as ciudad','proveedores.nombre as proveedor','areas.nombre as area',DB::raw('COUNT(respuestas.idformulario) as total'))
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->join('ciudades', 'ciudades.id', '=', 'tiendas.idciudad')
            ->join('proveedores', 'proveedores.id', '=', 'formularios.idproveedor')
            ->leftjoin('respuestas', 'respuestas.idformulario', '=', 'formularios.id')
            ->join('areas', 'areas.id', '=', 'gruposproductos.idarea')
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            //->where('formularios.estado','=',$request->get('estado'))

            ->groupBy('formularios.id')->get();

         $porgrupos = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->select('gruposproductos.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            ->groupBy('gruposproductos.id')->get();

        $porproductos = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->select('productos.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            ->groupBy('productos.id')->get();

        $poranomalias2 = DB::table('formularios')
            ->join('detallesanomalias', 'detallesanomalias.idformulario', '=', 'formularios.id')
            ->join('anomalias', 'anomalias.id', '=', 'detallesanomalias.idanomalia')
            ->select('anomalias.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            ->groupBy('anomalias.id')->get();

        $porproveedores = DB::table('formularios')
            ->join('proveedores', 'proveedores.id', '=', 'formularios.idproveedor')
            ->select('proveedores.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            ->groupBy('proveedores.id')->get();

        $portiendas = DB::table('formularios')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->select('tiendas.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            ->groupBy('tiendas.id')->get();

        $porciudades = DB::table('formularios')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->join('ciudades', 'ciudades.id', '=', 'tiendas.idciudad')
            ->select('ciudades.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            ->groupBy('ciudades.id')->get();

        $portiposgrupos = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('tiposgrupos', 'tiposgrupos.id', '=', 'gruposproductos.idtipogrupo')
            ->select('tiposgrupos.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            ->groupBy('tiposgrupos.id')->get();

        $porareas = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('areas', 'areas.id', '=', 'gruposproductos.idarea')
            //->join('tiposgrupos', 'tiposgrupos.id', '=', 'gruposproductos.idtipogrupo')
            ->select('areas.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where(function($query) use ($request){

                if($request->get('estado')!=3){
                    return $query->where('formularios.estado','=',$request->get('estado'));       
                }
            })
            ->groupBy('areas.id')->get();

        //return $request->get('estado');
        return view('admin.formularios.informeresumen',compact('poranomalias','porgrupos','porproductos','poranomalias2','porproveedores','portiendas','porciudades','portiposgrupos','fechas','porareas'));
    }


    public function Consolidado(Request $request)
    {

    /*DB::enableQueryLog();

    setlocale(LC_TIME, "es_ES");
    $mes = strftime("%B,",strtotime($request->get('fecha')));
    $fecha = $request->get('fecha');
    $ano = strftime("%Y,",strtotime($request->get('fecha')));

    $my_date = new DateTime();
 
    $my_date->modify('first day of '.$mes.' '.$ano.'');
    $inicio = $my_date->format('Y-m-d');

    $my_date->modify('last day of '.$mes.' '.$ano.'');
    $fin = $my_date->format('Y-m-d');

        $proveedor = Proveedor::pluck('nombre', 'id');         

         $consolidados = DB::table('formularios')
            ->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month'),DB::raw('COUNT(formularios.id) as total'))
            ->where('formularios.created_at', '>=', $my_date->format('Y-m-d'))
            ->groupby('year','month')->get();


         $abiertas = DB::table('formularios')
            ->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month'),DB::raw('COUNT(formularios.id) as total'))
            ->where('formularios.created_at', '>=', $my_date->format('Y-m-d'))
            ->where('formularios.estado','=',1)
            ->groupby('year','month')->get();

         $cerradas = DB::table('formularios')
            ->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month'),DB::raw('COUNT(formularios.id) as total'))
            ->where('formularios.created_at', '>=', $my_date->format('Y-m-d'))
            ->where('formularios.estado','=',2)
            ->groupby('year','month')->get();*/



         /*$proveedores = DB::table('formularios')
            ->join('proveedores', 'proveedores.id', '=', 'formularios.idproveedor')
            ->select('proveedores.nombre',DB::raw('YEAR(formularios.created_at) year, MONTH(formularios.created_at) month'),DB::raw('COUNT(formularios.id) as total'))
            ->where('formularios.created_at', '<=', $my_date->format('Y-m-d'))
            ->groupby('proveedores.nombre','year','month')->get();*/

        /*$porgrupos = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->select('gruposproductos.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where('formularios.estado','=',1)
            ->groupBy('gruposproductos.id')->get();

        $porproductos = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->select('productos.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where('formularios.estado','=',1)
            ->groupBy('productos.id')->get();

        $poranomalias2 = DB::table('formularios')
            ->join('detallesanomalias', 'detallesanomalias.idformulario', '=', 'formularios.id')
            ->join('anomalias', 'anomalias.id', '=', 'detallesanomalias.idanomalia')
            ->select('anomalias.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where('formularios.estado','=',1)
            ->groupBy('anomalias.id')->get();

        $porproveedores = DB::table('formularios')
            ->join('proveedores', 'proveedores.id', '=', 'formularios.idproveedor')
            ->select('proveedores.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where('formularios.estado','=',1)
            ->groupBy('proveedores.id')->get();

        $portiendas = DB::table('formularios')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->select('tiendas.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where('formularios.estado','=',1)
            ->groupBy('tiendas.id')->get();

        $porciudades = DB::table('formularios')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->join('ciudades', 'ciudades.id', '=', 'tiendas.idciudad')
            ->select('ciudades.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where('formularios.estado','=',1)
            ->groupBy('ciudades.id')->get();
 
        $portiposgrupos = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('tiposgrupos', 'tiposgrupos.id', '=', 'gruposproductos.idtipogrupo')
            ->select('tiposgrupos.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->where('formularios.estado','=',1)
            ->groupBy('tiposgrupos.id')->get();*/
         
        //dd(DB::getQueryLog());

        //return view('admin.formularios.consolidado',compact('consolidados','abiertas','cerradas','proveedores','proveedor'));

        //return $fecha;
        //return "Ariel";

        
    }

    public function informeporAnomalias(Request $request)
    {

    setlocale(LC_TIME, "In_IN");
    $mes = strftime("%B,",strtotime($request->get('fecha')));
    $ano = strftime("%Y,",strtotime($request->get('fecha')));

    $my_date = new DateTime();
 
    $my_date->modify('first day of '.$mes.' '.$ano.'');
    $inicio = $my_date->format('Y-m-d');

    $my_date->modify('last day of '.$mes.' '.$ano.'');
    $fin = $my_date->format('Y-m-d');
         
         $poranomalias = DB::table('formularios')
            ->join('detallesanomalias', 'detallesanomalias.idformulario', '=', 'formularios.id')
            ->join('anomalias', 'anomalias.id', '=', 'detallesanomalias.idanomalia')
            ->select('anomalias.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->orderBy('total', 'DESC')
            ->groupBy('anomalias.id')->get();

         //return $porproductos;
         
        return view('admin.formularios.informeanomalias',array('poranomalias' => $poranomalias));
    }

    public function porProveedores()
    {
        return view('admin.formularios.porproveedores');
    }

    public function informeporProveedores(Request $request)
    {

    setlocale(LC_TIME, "In_IN");
    $mes = strftime("%B,",strtotime($request->get('fecha')));
    $ano = strftime("%Y,",strtotime($request->get('fecha')));

    $my_date = new DateTime();
 
    $my_date->modify('first day of '.$mes.' '.$ano.'');
    $inicio = $my_date->format('Y-m-d');

    $my_date->modify('last day of '.$mes.' '.$ano.'');
    $fin = $my_date->format('Y-m-d');
         
         $porproveedores = DB::table('formularios')
            ->join('proveedores', 'proveedores.id', '=', 'formularios.idproveedor')
            ->select('proveedores.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->orderBy('total', 'DESC')
            ->groupBy('proveedores.id')->get();

         //return $porproductos;
         
        return view('admin.formularios.informeproveedores',array('porproveedores' => $porproveedores));
    }

    public function porTiendas()
    {
        return view('admin.formularios.portiendas');
    }

    public function informeporTiendas(Request $request)
    {

    setlocale(LC_TIME, "In_IN");
    $mes = strftime("%B,",strtotime($request->get('fecha')));
    $ano = strftime("%Y,",strtotime($request->get('fecha')));

    $my_date = new DateTime();
 
    $my_date->modify('first day of '.$mes.' '.$ano.'');
    $inicio = $my_date->format('Y-m-d');

    $my_date->modify('last day of '.$mes.' '.$ano.'');
    $fin = $my_date->format('Y-m-d');
         
         $portiendas = DB::table('formularios')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->select('tiendas.nombre',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->orderBy('total', 'DESC')
            ->groupBy('tiendas.id')->get();

         //return $porproductos;
         
        return view('admin.formularios.informetiendas',array('portiendas' => $portiendas));
    }

    public function porEstados()
    {
        return view('admin.formularios.porestados');
    }

    public function informeporEstados(Request $request)
    {

    setlocale(LC_TIME, "In_IN");
    $mes = strftime("%B,",strtotime($request->get('fecha')));
    $ano = strftime("%Y,",strtotime($request->get('fecha')));

    $my_date = new DateTime();
 
    $my_date->modify('first day of '.$mes.' '.$ano.'');
    $inicio = $my_date->format('Y-m-d');

    $my_date->modify('last day of '.$mes.' '.$ano.'');
    $fin = $my_date->format('Y-m-d');
         
         $porestados = DB::table('formularios')
            //->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->select('formularios.estado',DB::raw('COUNT(formularios.id) as total'))
            ->whereBetween('formularios.created_at', [$inicio, $fin])
            ->groupBy('formularios.estado')->get();

         //return $porproductos;
         
        return view('admin.formularios.informeestados',array('porestados' => $porestados));
    }

    public function loadGrupoEvaluacion($id)
    {
        $evaluaciones = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->select('productos.nombre as nombre_producto','formularios.id','tiendas.nombre as nombre_tienda','formularios.created_at','formularios.estado')

            ->where('productos.idgrupo', '=', $id)->get();

        //return dd($evaluaciones);

        $gruposproductos = DB::table('gruposproductos')
            ->select('gruposproductos.nombre')
            ->where('id','=', $id)->get();

        //return dd($gruposproductos);

        return view('admin.formularios.listgrupo',compact('evaluaciones','gruposproductos','id'));   
    }
    
    public function loadGrupoEvaluacionAll()
    {
        $evaluaciones = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->join('userstiendas','userstiendas.idtienda','=', 'tiendas.id')
            ->join('users','users.id','=', 'userstiendas.iduser')
            ->leftjoin('respuestas', 'respuestas.idformulario', '=', 'formularios.id')
            ->where('users.id','=', auth()->id())
            ->select('formularios.tipoincidente','productos.nombre as nombre_producto','formularios.id','tiendas.nombre as nombre_tienda','formularios.created_at','formularios.estado',DB::raw('COUNT(respuestas.idformulario) as total'))
            ->groupBy('formularios.id')->get();
            //->orderBy('formularios.id','DESC')->get();

            //->where('productos.idgrupo', '=', $id)->get();

        //return dd($evaluaciones);

        /*$gruposproductos = DB::table('gruposproductos')
            ->select('gruposproductos.nombre')
            >where('id','=', $id)->get();*/

        //return dd($gruposproductos);

        return view('admin.formularios.listgrupoAll',compact('evaluaciones'));   
    }

    public function detalleEvaluacion($id)
    {
           $detalleevaluaciones = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->join('proveedores','proveedores.id','=','formularios.idproveedor')
            ->select('tiendas.id as idtienda','productos.nombre as nombre_producto','formularios.id','tiendas.nombre as nombre_tienda','formularios.created_at','proveedores.nombre','formularios.estado','formularios.observacion','formularios.momento','formularios.promotora','formularios.tipoincidente','formularios.fechaidentificacion','formularios.fecharecepcion','lugaridentificado','formularios.cantidad','gruposproductos.nombre as nombre_grupo','formularios.lote','formularios.fechavencimiento','tiendas.correo as correo_tienda','formularios.id','formularios.created_at')

            ->where('formularios.id', '=', $id)->get();

            $anomalias = DB::table('detallesanomalias')
            ->join('formularios', 'formularios.id', '=', 'detallesanomalias.idformulario')
            ->join('anomalias', 'anomalias.id', '=', 'detallesanomalias.idanomalia')
            ->select('anomalias.nombre')

            ->where('detallesanomalias.idformulario', '=', $id)->get();

            $respuestas = DB::table('respuestas')
            ->join('formularios', 'formularios.id', '=', 'respuestas.idformulario')
            ->select('respuestas.responsable','respuestas.respuesta','respuestas.created_at')

            ->where('respuestas.idformulario', '=', $id)->get();

        return view('admin.formularios.detallevaluacion',compact('detalleevaluaciones','anomalias','respuestas'));        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'estado' => 'required:formularios|max:255'
    ]);
         $formularios = Formulario::find($id);
         
         $formularios->estado = $request->get('estado');

         $formularios->save();

         //return $formularios;

        $destino = DB::table('users')
            ->join('userstiendas', 'userstiendas.iduser', '=', 'users.id') 
            ->join('tiendas', 'tiendas.id', '=', 'userstiendas.idtienda') 
            ->where('tiendas.id','=', $request->get('idtienda'))
            ->where('users.id','!=', 38)
            ->where('users.id','!=', 45)
            ->where('users.id','!=', 46)
            ->where('users.id','!=', 47)
            ->select('users.email')
            ->get();

        $evaluaciones = DB::table('formularios')
            ->join('productos', 'productos.id', '=', 'formularios.idproducto')
            ->join('gruposproductos', 'productos.idgrupo', '=', 'gruposproductos.id')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->select('productos.nombre as nombre_producto','formularios.id','tiendas.nombre as nombre_tienda','formularios.created_at','formularios.estado')

            ->where('formularios.id', '=', $id)->get();

        //return $destino;    
        Mail::to($destino)->send(new AnomaliaCerrada($id,$evaluaciones));
        //return dd($datas);
         
        return redirect()->route('ver-detallevaluacion',array('id'=>$id))->with('message', 'Anomalía cerrada correctamente!!!');
    }
}
