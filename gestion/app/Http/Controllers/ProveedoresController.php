<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proveedor;

class ProveedoresController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $proveedores = Proveedor::all();
        return view('admin.proveedores.index',compact('proveedores'));
    }

    public function create()
    {
        return view('admin.proveedores.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:proveedores|max:255',
        'nit' => 'required|unique:proveedores|max:255',
        'direccion' => 'required:proveedores|max:255',
        'telefono' => 'required:proveedores|max:255',
        //'contacto' => 'required:proveedores|max:255',
    ]);

        $proveedores = Proveedor::create([
                'nombre' => $request->get('nombre'),
                'nit' => $request->get('nit'),
                'direccion' => $request->get('direccion'),
                'telefono' => $request->get('telefono'),
                'contacto' => $request->get('contacto'),
            ]);
        return redirect()->route('proveedores.index');
    }

    public function show($id)
    {
        //
    }
 
    public function productos($id)
    {
        return 1;
    }

    public function edit($id)
    {
        $proveedores = Proveedor::find($id);
        return view('admin.proveedores.edit',compact('proveedores'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
        'nombre' => 'required|unique:proveedores|max:255',
        //'nit' => 'required|unique:proveedores|max:255',
        'direccion' => 'required:proveedores|max:255',
        'telefono' => 'required:proveedores|max:255',
        //'contacto' => 'required:proveedores|max:255',
    ]);
         $proveedores = Proveedor::find($id);
         
         $proveedores->nombre = $request->get('nombre');
         //$proveedores->nit = $request->get('nit');
         $proveedores->direccion = $request->get('direccion');
         $proveedores->telefono = $request->get('telefono');
         $proveedores->contacto = $request->get('contacto');

         $proveedores->save();

        return redirect()->route('proveedores.index');
    }

    public function destroy($id)
    {
        $proveedores = Proveedor::find($id);
        $proveedores->delete();
        
        return redirect()->route('proveedores.index');
    }
}
