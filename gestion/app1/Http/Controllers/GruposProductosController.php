<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GrupoProducto;

class GruposProductosController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $gruposproductos = GrupoProducto::all();
        return view('admin.gruposproductos.index',compact('gruposproductos'));
    }

    public function create()
    {
        return view('admin.gruposproductos.create');
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
        'nombre' => 'required|unique:gruposproductos|max:255'
    ]);

        $gruposproductos = GrupoProducto::create([
                'nombre' => $request->get('nombre')
            ]);
        return redirect()->route('gruposproductos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $gruposproductos = GrupoProducto::find($id);
        return view('admin.gruposproductos.edit',compact('gruposproductos'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request,[
        'nombre' => 'required|unique:gruposproductos|max:255'
    ]);
         $gruposproductos = GrupoProducto::find($id);
         
         $gruposproductos->nombre = $request->get('nombre');

         $gruposproductos->save();
         
        return redirect()->route('gruposproductos.index');
    }

    public function destroy($id)
    {
        $gruposproductos = GrupoProducto::find($id);
        $gruposproductos->delete();
        
        return redirect()->route('gruposproductos.index');
    }
}
