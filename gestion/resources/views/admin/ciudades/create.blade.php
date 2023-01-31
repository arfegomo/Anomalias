@extends('master')
@section('titulo','Crear ciudades')

@section('contenido1')

<b>Crear ciudades</b>

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

{!! Form::open(['route' => 'ciudades.store']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre de la ciudad'
    )) !!}

    </div>
    {!! Form::submit('Guardar ciudad', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection