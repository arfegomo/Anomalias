@extends('master')
@section('titulo','Editar proveedores')

@section('contenido1')

<b>Editar proveedores</b>

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

{!! Form::model($proveedores, ['route' => ['proveedores.update', $proveedores->id],'method'=>'PUT']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre del proveedor'
    )) !!}

    </div>
    <div class="form-group">
    <label for="nit">Nit/Documento:</label>               
   {!! Form::text('nit',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Nit / documento'
    )) !!}

    </div>

    <div class="form-group">
    <label for="nit">Dirección:</label>               
    {!! Form::text('direccion',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Dirección del proveedor'
    )) !!}
    </div>

    <div class="form-group">
    <label for="nit">Teléfono:</label>               
    {!! Form::text('telefono',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Teléfono del proveedor'
    )) !!}
    </div>

    <div class="form-group">
    <label for="nit">Contacto:</label>               
    {!! Form::text('contacto',null,array(
        'class'=>'form-control',
        'placeholder'=>'Contacto del proveedor'
    )) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Actualizar proveedor', array('class'=>'btn btn-warning')) !!}
    </div>

    </div>

    </div>
{!! Form::close() !!}

@endsection