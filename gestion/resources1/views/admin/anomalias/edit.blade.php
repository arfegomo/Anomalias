@extends('master')
@section('titulo','Edite anomalias')

@section('contenido1')

<b>Edite anomalias</b>

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

{!! Form::model($anomalias, ['route' => ['anomalias.update', $anomalias->id],'method'=>'PUT']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre anomalia'
    )) !!}

    </div>
    {!! Form::submit('Actualizar anomalia', array('class'=>'btn btn-warning')) !!}
    </div>
{!! Form::close() !!}

@endsection