@extends('master')
@section('titulo','Listado de suscripciones')

@section('contenido1')

<b>Listado de suscripciones.</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('ver-despachos') }}">Ver pŕoximos despachos</a>
<a href="{{ route('suscripciones.create') }}" class="btn btn-primary">Registrar suscripcion</a></div>
<hr>

<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th># Pedido</th>
   <th>Fecha inicio</th>
   <th>Fecha final</th>
   <th>Tipo</th>
   <th># Factura</th>
   <th>Estado</th>
   <th>Despachos programados</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>

@foreach($suscripciones as $suscripcion)

	<td>{{ $suscripcion->numeropedido }}</td>
	<td>{{ $suscripcion->fechainicio }}</td>
	<td>{{ $suscripcion->fechafinal }}</td>
	
	@if ($suscripcion->tiposuscripcion == 1)
	<td>Trimestral</td>
	@elseif ($suscripcion->tiposuscripcion == 2)
	<td>Semestral</td>
	@else
	<td>Anual</td>
	@endif
	
	
	<td>{{ $suscripcion->numerofactura }}</td>
	
	@if ($suscripcion->estado == 1)
	<td>Iniciada</td>
	@else
	<td>Finalizada</td>
	@endif
	
	<td>{{ $suscripcion->total }}</td>
	
	<td>
	<a class="btn btn-warning" href="{{ route('ver-detallesuscripcion',$suscripcion->id) }}">
	<i class="fa fa-binoculars fa-2x"></i>
	</a>
	</td>
	
</tr>
@endforeach

	
</table>

@endsection
