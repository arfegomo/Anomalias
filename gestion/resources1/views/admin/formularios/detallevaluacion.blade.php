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

<hr>

{!! Form::open(['route' => 'respuestas.store']) !!}
    
    <div class="row">
    <div class="col-md-6">
    @foreach($detalleevaluaciones as $detalleevaluacion)

    <div class="form-group">
    {!! Form::Label('item', 'Grupo:') !!}
    {!! Form::text('grupo',$detalleevaluacion->nombre_grupo, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Tienda:') !!}
    {!! Form::text('tienda',$detalleevaluacion->nombre_tienda, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Producto:') !!}
    {!! Form::text('producto',$detalleevaluacion->nombre_producto, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Proveedor:') !!}
    {!! Form::text('proveedor',$detalleevaluacion->nombre, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Lote:') !!}
    {!! Form::text('lote',$detalleevaluacion->lote, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Feccha creación anomalía:') !!}
    {!! Form::text('fechaanomalia',$detalleevaluacion->created_at, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Fecha vencimiento producto:') !!}
    {!! Form::text('fechavencimiento',$detalleevaluacion->fechavencimiento, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Identificado por:') !!}
    @if($detalleevaluacion->momento == 1)
    {!! Form::text('momento','Promotora de venta', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @else
    {!! Form::text('momento','Auditoría', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @endif
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Promotora:') !!}
    {!! Form::text('promotora',$detalleevaluacion->promotora, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Observación:') !!}
    {!! Form::textarea('observacion',$detalleevaluacion->observacion, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::hidden('idformulario', $detalleevaluacion->id) !!}
    {!! Form::hidden('correotienda', $detalleevaluacion->correo_tienda) !!}
    {!! Form::hidden('idtienda', $detalleevaluacion->idtienda) !!}
    </div>    

    <div class="form-group">
    {!! Form::Label('item', 'Responda: ') !!} 
    {!! Form::textarea('respuesta', null, ['class' => 'form-control','placeholder' => 'Detalle su respuesta...']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Responsable:') !!}
    {!! Form::text('responsable',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    @if($detalleevaluacion->estado==1)
    {!! Form::submit('Responder', array('class'=>'btn btn-warning')) !!}
    @else
   
    @endif
    </div>
    {!! Form::close() !!}


    @if(Auth::user()->idperfil != 3)
        @if($detalleevaluacion->estado==1)
    {!! Form::model($detalleevaluacion, ['route' => ['formularios.update', $detalleevaluacion->id],'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::hidden('estado', 2) !!}
        {!! Form::hidden('idtienda', $detalleevaluacion->idtienda) !!}
        {!! Form::submit('Cerrar caso', array('class'=>'btn btn-success')) !!}
    </div>
        @endif
    @else
    
    @endif

    @endforeach
    {!! Form::close() !!}

    </div>

<div class="col-md-6">
<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th>Anomalias presentadas</th>
   </tr>
</thead>
    <tr>
@foreach($anomalias as $anomalia)
    <td>{{ $anomalia->nombre }}</td>
    </tr>
@endforeach
    
</table>

<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th>Responde</th>
   <th>Obs.</th>
   <th>Fecha</th>
   </tr>
</thead>
    <tr>
@foreach($respuestas as $respuesta)
    <td>{{ $respuesta->responsable }}</td>
    <td>{{ $respuesta->respuesta }}</td>
    <td>{{ $respuesta->created_at }}</td>
    </tr>
@endforeach
    
</table>
    
</div>

</div>

@endsection

