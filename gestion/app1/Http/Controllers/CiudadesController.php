<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;

class CiudadesController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $ciudades = Ciudad::all();
        return view('admin.ciudades.index',compact('ciudades'));
    }

    public function create()
    {
        return view('admin.ciudades.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:ciudades|max:255'
    ]);

        $ciudades = Ciudad::create([
                'nombre' => $request->get('nombre')
            ]);
        return redirect()->route('ciudades.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $ciudades = Ciudad::find($id);
        return view('admin.ciudades.edit',compact('ciudades'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:ciudades|max:255'
    ]);
         $ciudades = Ciudad::find($id);
         
         $ciudades->nombre = $request->get('nombre');

         $ciudades->save();
         
        return redirect()->route('ciudades.index');
    }

    public function destroy($id)
    {
        $ciudades = Ciudad::find($id);
        $ciudades->delete();
        
        return redirect()->route('ciudades.index');
    }
}
