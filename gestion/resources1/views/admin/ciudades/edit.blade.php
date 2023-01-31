@extends('master')
@section('titulo','Edite ciudades')

@section('contenido1')

<b>Edite ciudades</b>

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

{!! Form::model($ciudades, ['route' => ['ciudades.update', $ciudades->id],'method'=>'PUT']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre de la ciudad'
    )) !!}

    </div>
    {!! Form::submit('Actualizar ciudad', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection