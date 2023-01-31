@extends('master')
@section('titulo','Listado de anomalias')

@section('contenido1')
 
@foreach($fechas as $fecha)
<h2><strong>Resumen anomalías
@if($fecha['estado'] == 1)
{{ 'Abiertas:' }}
@elseif($fecha['estado'] == 2)
{{ 'Cerradas:' }}
@else
{{ 'Consolidado' }}
@endif
{{ $fecha['inicio'] }} a {{ $fecha['fin'] }}
</strong></h2>
@endforeach


@endsection

@section('contenido2')

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">

<div class="row"> 
<div class="col-md-2">
<div class="form-group">
<a href="{{ route('consolidado-gerencia') }}" class="btn btn-success">Ver resumen Gerencia</a>
</div>
</div>

<div class="col-md-1">
<div class="form-group">
{!! Form::open(array('url' => 'informe-resumen')) !!}
<input type="hidden" name="estado" value="2" > 
@foreach($fechas as $fecha)
  <input type="hidden" name="fecha" value="{{ $fecha['inicio'] }}">
@endforeach
{!! Form::submit('Ver cerradas', array('class'=>'btn btn-warning')) !!}
{!! Form::close() !!}
</div>
</div>

<div class="col-md-1">
<div class="form-group">
{!! Form::open(array('url' => 'informe-resumen')) !!}
<input type="hidden" name="estado" value="3" > 
@foreach($fechas as $fecha)
  <input type="hidden" name="fecha" value="{{ $fecha['inicio'] }}">
@endforeach
{!! Form::submit('Consolidado', array('class'=>'btn btn-warning')) !!}
{!! Form::close() !!}
</div>
</div>

<div class="col-md-1">
<div class="form-group">
{!! Form::open(array('url' => 'informe-resumen')) !!}
<input type="hidden" name="estado" value="1" > 
@foreach($fechas as $fecha)
  <input type="hidden" name="fecha" value="{{ $fecha['inicio'] }}">
@endforeach
{!! Form::submit('Ver abiertas', array('class'=>'btn btn-warning')) !!}
{!! Form::close() !!}
</div>
</div>

</div>
<hr>
<div class="row">
<table id="table_id" class="display">
<thead>
            
   <tr>
   <th>Id Anomlia</th>
   <th>Fecha solicitud</th>
   <th>Área</th>
   <th>Grupo</th>
   <th>Producto</th>
   <th>Proveedor</th>
   <th>Ciudad</th>
   <th>Tienda</th>
   <th>Días transcurridos</th>
   <th>Respuestas</th>
   <th>Estado</th>
   <th>Acciones</th>
   </tr>
</thead>
    <tr>
    <?php $date = new DateTime(); ?>	
@foreach($poranomalias as $poranomalia)
    <td>{{ $poranomalia->id }}</td>
    <td>{{ $poranomalia->created_at }}</td>
    <td>{{ $poranomalia->area }}</td>
    <td>{{ $poranomalia->grupo }}</td>
    <td>{{ $poranomalia->producto }}</td>
    <td>{{ $poranomalia->proveedor }}</td>
    <td>{{ $poranomalia->ciudad }}</td>
    <td>{{ $poranomalia->tienda }}</td>
    @if($poranomalia->estado == 2)
    <td><i class="glyphicon glyphicon-ok-sign fa-2x"></td>
    @else
    <?php 
    $dias = (strtotime($date->format('Y-m-d H:i')) - strtotime($poranomalia->created_at))/86400;
    $dias = round(abs($dias)); //$dias = floor($dias); 
    ?>
    <td>{{ $dias }}</td>
    @endif
    @if($poranomalia->total > 0)
    <td><i class="fa fa-thumbs-up fa-2x text-danger" style="color:green;"></i> [ {{ $poranomalia->total }} ]</td>
    @else
    <td><i class="fa fa-thumbs-down fa-2x text-danger" style="color:red;"></i> [ {{ $poranomalia->total }} ]</td>
    @endif
    @if($poranomalia->estado == 1)
    <td><i class="fa fa-envelope-open-o fa-2x"></i></td>    
        @else
    <td><i class="fa fa-envelope fa-2x"></i></td>        
@endif
  <td>
  <a class="btn btn-warning" href="{{ route('ver-detallevaluacion',$poranomalia->id) }}" target="_blank">
  <i class="fa fa-binoculars fa-1x"></i>
  </a>
  </td>
    </tr>
@endforeach
    
</table>
</div>
<hr>
<div class="row">
<div class="col-md-4">
<table id="table_id2" class="display" >
<thead>
            
   <tr>
   <th>Grupo</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($porgrupos as $porgrupo)
    <td>{{ $porgrupo->nombre }}</td>
    <td>{{ $porgrupo->total }}</td>
    </tr>
@endforeach
    
</table>
</div>

<div class="col-md-4">
<table id="table_id3" class="display">
<thead>
            
   <tr>
   <th>Producto</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($porproductos as $porproducto)
    <td>{{ $porproducto->nombre }}</td>
    <td>{{ $porproducto->total }}</td>
    </tr>
@endforeach
    
</table>
</div>

<div class="col-md-4">
<table id="table_id4" class="display">
<thead>
            
   <tr>
   <th>Anomalia</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($poranomalias2 as $poranomalia)
    <td>{{ $poranomalia->nombre }}</td>
    <td>{{ $poranomalia->total }}</td>
    </tr>
@endforeach
    
</table>
</div>

</div>
<hr>
<div class="row">
<div class="col-md-4">
<table id="table_id5" class="display">
<thead>
            
   <tr>
   <th>Proveedor</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($porproveedores as $porproveedor)
    <td>{{ $porproveedor->nombre }}</td>
    <td>{{ $porproveedor->total }}</td>
    </tr>
@endforeach
    
</table>
</div>

<div class="col-md-4">
<table id="table_id6" class="display">
<thead>
            
   <tr>
   <th>Tienda</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($portiendas as $portienda)
    <td>{{ $portienda->nombre }}</td>
    <td>{{ $portienda->total }}</td>
    </tr>
@endforeach
    
</table>
</div>

<div class="col-md-4">
<table id="table_id7" class="display">
<thead>
            
   <tr>
   <th>Ciudad</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($porciudades as $porciudad)
    <td>{{ $porciudad->nombre }}</td>
    <td>{{ $porciudad->total }}</td>
    </tr>
@endforeach
    
</table>
</div>

</div>

<hr>
<div class="row">
<div class="col-md-4">
<table id="table_id10" class="display">
<thead>
            
   <tr>
   <th>Área</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($porareas as $porarea)
    <td>{{ $porarea->nombre }}</td>
    <td>{{ $porarea->total }}</td>
    </tr>
@endforeach
    
</table>
</div>
</div>

<hr>
<!--
<div class="row">
<div class="col-md-4">
<table id="table_id9" class="display" >
<thead>
            
   <tr>
   <th>Área</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($portiposgrupos as $portipogrupo)
    <td>{{ $portipogrupo->nombre }}</td>
    <td>{{ $portipogrupo->total }}</td>
    </tr>
@endforeach
    
</table>
</div>
</div>
-->
<!--<a href="{{ route('exportargrupos') }}" class="btn btn-info">Exportar</a>-->
@endsection
