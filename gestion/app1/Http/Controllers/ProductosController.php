<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\GrupoProducto;

class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $productos = Producto::orderBy('id','desc')->get();
        return view('admin.productos.index',compact('productos'));
    }

    public function create()
    {
        $gruposproductos = GrupoProducto::pluck('nombre', 'id');
        return view('admin.productos.create',compact('gruposproductos'));
    }

    public function store(Request $request)
    {
                
        $this->validate($request,[
        'nombre' => 'required|unique:productos|max:255',
        'idgrupo' => 'required:gruposproductos'
    ]);

        $productos = Producto::create([
                'nombre' => $request->get('nombre'),
                'idgrupo' => $request->get('idgrupo')
            ]);
        return redirect()->route('productos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $gruposproductos = GrupoProducto::pluck('nombre', 'id');
        $productos = Producto::find($id);
        return view('admin.productos.edit',compact('productos','gruposproductos'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:productos|max:255',
        'idgrupo' => 'required'
    ]);
         $productos = Producto::find($id);
         
         $productos->nombre = $request->get('nombre');
         $productos->idgrupo = $request->get('idgrupo');

         $productos->save();
         
        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $productos = Producto::find($id);
        $productos->delete();
        
        return redirect()->route('productos.index');
    }
}
