@extends('master')
@section('titulo','Crear productos')

@section('contenido1')

<b>Crear productos</b>

@endsection

@section('contenido2')
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<hr>

{!! Form::open(['route' => 'productos.store']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre del producto'
    )) !!}

    </div>
    
    <div class="form-group">
    {!! Form::Label('item', 'Grupo:') !!}
    {!! Form::select('idgrupo', $gruposproductos, null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Guardar producto', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection