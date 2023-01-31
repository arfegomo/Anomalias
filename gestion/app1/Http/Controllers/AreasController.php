<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;

class AreasController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $areas = Area::all();
        return view('admin.areas.index',compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:areas|max:255',
        'responsable' => 'required|unique:areas|max:255',
        'correo' => 'required|unique:areas|max:255'
    ]);

        $anomalias = Area::create([
                'nombre' => $request->get('nombre'),
                'responsable' => $request->get('responsable'),
                'correo' => $request->get('correo')
            ]);
        return redirect()->route('areas.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $areas = Area::find($id);
        return view('admin.areas.edit',compact('areas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:areas|max:255',
        'responsable' => 'required|unique:areas|max:255',
        'correo' => 'required|unique:areas|max:255'
    ]);
         $areas = Area::find($id);
         
         $areas->nombre = $request->get('nombre');
         $areas->responsable = $request->get('nombre');
         $areas->correo = $request->get('nombre');

         $areas->save();
         
        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        $areas = Area::find($id);
        $areas->delete();
        
        return redirect()->route('areas.index');
    }
}
