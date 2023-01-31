@extends('master')
@section('titulo','Crear tiendas')

@section('contenido1')

<b>Crear tiendas</b>

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

{!! Form::open(['route' => 'tiendas.store']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre del tienda'
    )) !!}

    </div>

    <div class="form-group">
    <label for="Correo">Correo:</label>

    {!! Form::email('correo',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Correo de la tienda'
    )) !!}

    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Ciudad:') !!}
    {!! Form::select('idciudad', $ciudades, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Guardar tienda', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection