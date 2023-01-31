<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RespuestaCreada;
use App\Respuesta;

class RespuestasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'idformulario' => 'required:respuestas',
        'responsable' => 'required:respuestas',
        'respuesta' => 'required:respuestas'

    ]);

        $respuestas = Respuesta::create([
                'idformulario' => $request->get('idformulario'),
                'respuesta' => $request->get('respuesta'),
                'responsable' => $request->get('responsable')
            ]);

        //return $respuestas;

       $idformulario = $request->get('idformulario');
       $grupo = $request->get('grupo');
       $correoTienda = $request->get('correo_tienda');

        $destino = DB::table('users')
            ->join('userstiendas', 'userstiendas.iduser', '=', 'users.id') 
            ->join('tiendas', 'tiendas.id', '=', 'userstiendas.idtienda') 
            ->where('tiendas.id','=', $request->get('idtienda'))
            ->where('users.id','!=', 45)
            ->select('users.email')
            ->get();
        
        $evaluaciones = DB::table('formularios')
            ->join('respuestas', 'respuestas.idformulario', '=', 'formularios.id')
            ->join('tiendas', 'tiendas.id', '=', 'formularios.idtienda')
            ->select('formularios.id','tiendas.nombre as nombre_tienda','formularios.created_at','formularios.estado','respuestas.respuesta','respuestas.responsable')

            ->where('formularios.id', '=', $idformulario)->get();


        
       //return $destino;    

       //Mail::to($destino)->send(new RespuestaCreada($idformulario,$evaluaciones));

       //return dd($respuestas);

       return redirect()->route('ver-detallevaluacion',array('id'=>$idformulario))->with('message', 'Respuesta guardada correctamente!!!');
    }

}
