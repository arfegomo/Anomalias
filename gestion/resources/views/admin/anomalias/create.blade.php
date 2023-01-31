@extends('master')
@section('titulo','Crear anomalias')

@section('contenido1')

<b>Crear anomalias</b>

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

{!! Form::open(['route' => 'anomalias.store']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre del anomalia'
    )) !!}

    </div>
    {!! Form::submit('Guardar anomalia', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection