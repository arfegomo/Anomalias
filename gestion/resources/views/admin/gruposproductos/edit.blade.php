@extends('master')
@section('titulo','Edite grupos de productos')

@section('contenido1')

<b>Edite grupos de productos</b>

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

{!! Form::model($gruposproductos, ['route' => ['gruposproductos.update', $gruposproductos->id],'method'=>'PUT']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre del grupo'
    )) !!}

    </div>
    {!! Form::submit('Actualizar grupo', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection