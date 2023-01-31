@extends('master')
@section('titulo','Listado de grupos de productos')

@section('contenido1')

<b>Ver evaluaciones de grupos de productos:</b>
@foreach($gruposproductos as $grupoproducto)
<b>{{ $grupoproducto->nombre }}</b>
@endforeach 

@endsection

@section('contenido2')
<!--<div align="right"><a href="{{ route('gruposproductos.create') }}" class="btn btn-primary">Crear grupo</a></div>-->
<hr>

<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th># Evaluación</th>
   <th>Fecha</th>
   <th>Tienda</th>
   <th>Producto</th>
   <th>Estado</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>
@foreach($evaluaciones as $evaluacion)
	<td>{{ $evaluacion->id }}</td>
	<td>{{ $evaluacion->created_at }}</td>
	<td>{{ $evaluacion->nombre_tienda }}</td>
	<td>{{ $evaluacion->nombre_producto }}</td>
	@if($evaluacion->estado == 1)
	<td>{{ "Abierta" }}</td>
	@else
	<td>{{ "Cerrada" }}</td>
	@endif
	<td>
	<a class="btn btn-warning" href="{{ route('ver-detallevaluacion',$evaluacion->id) }}">
	<i class="fa fa-binoculars fa-2x"></i>
	</a>
	</td>
	</tr>
@endforeach
	
</table>

@endsection
