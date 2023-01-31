@extends('master')
@section('titulo','Crear grupos de productos')

@section('contenido1')

<b>Crear grupos de productos</b>

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

{!! Form::open(['route' => 'gruposproductos.store']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre del grupo'
    )) !!}

    </div>
    {!! Form::submit('Guardar grupo', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection