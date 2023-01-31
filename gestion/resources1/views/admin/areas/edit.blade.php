@extends('master')
@section('titulo','Edite áreas')

@section('contenido1')

<b>Edite áreas</b>

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

{!! Form::model($areas, ['route' => ['areas.update', $areas->id],'method'=>'PUT']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre anomalia'
    )) !!}

    </div>
	
	<div class="form-group">
    <label for="Responsable">Responsable:</label>

    {!! Form::text('responsable',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Responsable'
    )) !!}

    </div>

    <div class="form-group">
    <label for="Correo">Correo:</label>

    {!! Form::text('correo',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Correo'
    )) !!}

    </div>

    {!! Form::submit('Actualizar anomalia', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection