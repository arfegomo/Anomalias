@extends('master')
@section('titulo','Registrar anomalía')

@section('contenido1')

<b>Crear suscripciones</b>

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

{!! Form::open(['route' => 'suscripciones.store']) !!}
	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Pedido"># Pedido:</label>

    {!! Form::text('numeropedido',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'# del pedido'
    )) !!}

    </div>
    
    <div class="form-group">
    <label for="Factura"># Factura:</label>

    {!! Form::text('numerofactura',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'# de factura'
    )) !!}

    </div>
    
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    {!! Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre'
    )) !!}

    </div>
    
     <div class="form-group">
    <label for="Correo">Correo del cliente:</label>

    {!! Form::text('correo',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Correo del cliente'
    )) !!}

    </div>
    
    <div class="form-group">
      <label for="fechainicio">Fecha de inicio</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechainicio" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>
    
    <div class="form-group">
      <label for="fechafinal">Fecha final</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechafinal" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    <input type="hidden" id="dtp_input1" value="" /><br/>
    </div>
    
    
    </div>
    
    <div class="col-md-6">
    
    <div class="form-group">
    {!! Form::Label('item', 'Estado:') !!}
    {!! Form::select('estado',['1' => 'Iniciada','2' => 'Finalizada'],null,['class' => 'form-control','placeholder' => 'Elija...']) !!}
    </div>
    
    <div class="form-group">
    {!! Form::Label('item', 'Tipo de suscripcion:') !!}
    {!! Form::select('tiposuscripcion',['1' => 'Trimestral','2' => 'Semestral','3' => 'Anual'],null,['class' => 'form-control','placeholder' => 'Elija...']) !!}
    </div>
    
     <div class="form-group">
    {!! Form::Label('item', 'Tipo de molienda:') !!}
    {!! Form::select('molienda',['1' => 'Grano','2' => 'Fina','3' => 'Media', '4' => 'Gruesa'],null,['class' => 'form-control','placeholder' => 'Elija...']) !!}
    </div>
    
    <div class="form-group">
    <label for="Pedido">Cantidad a enviar x mes:</label>

    {!! Form::text('cantidad',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'cantidad'
    )) !!}

    </div>
   
     <div class="form-group">
    {!! Form::submit('Guardar suscripcion', array('class'=>'btn btn-warning btn-block')) !!}
    </div>    
    
    </div>
    
   
{!! Form::close() !!}

@endsection