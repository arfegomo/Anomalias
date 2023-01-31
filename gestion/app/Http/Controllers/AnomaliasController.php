<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anomalia;

class AnomaliasController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $anomalias = Anomalia::all();
        return view('admin.anomalias.index',compact('anomalias'));
    }

    public function create()
    {
        return view('admin.anomalias.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:anomalias|max:255'
    ]);

        $anomalias = Anomalia::create([
                'nombre' => $request->get('nombre')
            ]);
        return redirect()->route('anomalias.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $anomalias = Anomalia::find($id);
        return view('admin.anomalias.edit',compact('anomalias'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nombre' => 'required|unique:anomalias|max:255'
    ]);
         $anomalias = Anomalia::find($id);
         
         $anomalias->nombre = $request->get('nombre');

         $anomalias->save();
         
        return redirect()->route('anomalias.index');
    }

    public function destroy($id)
    {
        $anomalias = Anomalia::find($id);
        $anomalias->delete();
        
        return redirect()->route('anomalias.index');
    }
}
