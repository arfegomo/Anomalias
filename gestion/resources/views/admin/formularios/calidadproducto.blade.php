@extends('master')
@section('titulo','Evaluación de calidad de productos')

@section('contenido1')

<b>Evaluación de calidad de productos</b>

@endsection

@section('contenido2')

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
@if(session()->has('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session()->get('message') }}
    </div>
@endif

{!! Form::open(['route' => 'formularios.store','files' => 'true']) !!}

	<div class="col-md-6">

    <div class="form-group">
    {!! Form::Label('item', 'Tienda:') !!}
    {!! Form::select('idtienda', $tiendas, null, ['class' => 'form-control','placeholder' => 'Seleccione su tienda...']) !!}
    </div>
    
    <div class="form-group">
    {!! Form::Label('item', 'Grupo:') !!}
    {!! Form::select('idgrupo', $gruposproductos, null, ['class' => 'form-control','placeholder' => 'Seleccione un grupo de productos...']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Producto:') !!}
    <select name="productos" id="productos" data-old="{{ old('producto_id') }}" class="form-control">
        
    </select>
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Proveedor:') !!}
    <select name="proveedores" id="proveedores" data-old="{{ old('proveedor_id') }}" class="form-control">
        
    </select>
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Incidente:') !!}
    {!! Form::select('tipoincidente', ['1' => 'Anomalia','2'=>'Producto no conforme'], null, ['class' => 'form-control','placeholder' => 'Seleccione un incidente...']) !!}
    </div>
    

    <div class="form-group">
    {!! Form::Label('item', 'Lote # de remisión:') !!}
    {!! Form::text('lote', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      <label for="fechavencimiento">Fecha de vencimiento</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechavencimiento" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>
         


    <!--<div class="form-group">
    {!! Form::Label('item', 'Fecha de vencimiento:') !!}
    {!! Form::text('fechavencimiento', null, ['class' => 'form-control']) !!}
    </div>-->

    <div id="contenedor">
    <div class="form-group">
    {!! Form::Label('item', 'Anomalia:') !!}
    </div>
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Observación:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control','placeholder' => 'Detalle la observación de la anomalía...']) !!}
    </div>
    
    <br>

    <div class="form-group">
    {!! Form::Label('item', 'Identificado por:') !!}
    {!! Form::select('momento',['1' => 'Promotora de venta','2' => 'Auditoría', '3' => 'Cliente Institucional'],null,['class' => 'form-control','placeholder' => 'Elija...']) !!}
    </div>
    
    <div class="form-group">
    {!! Form::Label('item', 'Nombre y apellidos completos promotora / Vendedor:') !!}
    {!! Form::text('promotora', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Adjunte imágen (No adjuntar, en desarrollo!!!):') !!}
    {!! Form::file('imagen', null, ['class' => 'form-control']) !!}
    </div>

    <br>
   
</div>

<div class="col-md-6" id="producto-no">
    
    <div class="form-group">
      <label for="fechaidentificacion">Fecha de identificación:</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechaidentificacion" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>

     <div class="form-group">
    {!! Form::Label('item', 'Lugar donde se identificó:') !!}
    {!! Form::select('lugaridentificado',['1' => 'Recepción','2' => 'Alamacenado o exhibido', '3' => 'Entrega al cliente'],null,['class' => 'form-control','placeholder' => 'Elija...']) !!}
    </div>

    <div class="form-group">
      <label for="fecharecepcion">Fecha de recepción:</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fecharecepcion" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>


    <div class="form-group">
    {!! Form::Label('cantidad', 'Cantidad:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control']) !!}
    </div>

    </div>


    <div class="form-group">
    {!! Form::submit('Guardar evaluación', array('class'=>'btn btn-warning')) !!}
    </div>
    {!! Form::close() !!}

<div class="col-md-6">
    <a class="" href="{{ route('ver-grupoevaluacion-all') }}">
            <span class="fa fa-arrow-right">&nbsp;</span> Ver mis evaluaciones
    </a>
</div>

@endsection