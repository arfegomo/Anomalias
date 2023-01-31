<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tienda;
use App\Ciudad;

class TiendasController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $tiendas = Tienda::all();
        return view('admin.tiendas.index',compact('tiendas'));
    }

    public function create()
    {
        $ciudades = Ciudad::pluck('nombre', 'id');
        return view('admin.tiendas.create',compact('ciudades'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:tiendas|max:255',
        'idciudad' => 'required:ciudades',
        'correo' => 'required|unique:tiendas|max:255'
    ]);

        $tiendas = Tienda::create([
                'nombre' => $request->get('nombre'),
                'idciudad' => $request->get('idciudad'),
                'correo' => $request->get('correo')
            ]);
        return redirect()->route('tiendas.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ciudades = Ciudad::pluck('nombre', 'id');
        $tiendas = Tienda::find($id);
        return view('admin.tiendas.edit',compact('ciudades','tiendas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:tiendas|max:255',
        'idciudad' => 'required:ciudades',
        'correo' => 'required|unique:tiendas|max:255'
    ]);

         $tiendas = Tienda::find($id);
         
         $tiendas->nombre = $request->get('nombre');
         $tiendas->idciudad = $request->get('idciudad');
         $tiendas->correo = $request->get('correo');

         $tiendas->save();

        return redirect()->route('tiendas.index');
    }

    public function destroy($id)
    {
        $tiendas = Tienda::find($id);
        $tiendas->delete();
        
        return redirect()->route('tiendas.index');
    }
}
