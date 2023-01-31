@extends('master')
@section('titulo','Listado de suscripciones')

@section('contenido1')

<b>Listado de suscripciones.</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('sucripciones.create') }}" class="btn btn-primary">Registrar suscripcion</a></div>
<hr>

<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th># Pedido</th>
   <th>Fecha inicio</th>
   <th>Fecha final</th>
   <th># Factura</th>
   <th>Estado</th>
   <th>Total despachos</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>

@foreach($suscripciones as $suscripcion)
	<td>{{ $suscripcion->numeropedido }}</td>
	<td>{{ $suscripcion->fechainicio }}</td>
	<td>{{ $suscripcion->fechafinal }}</td>
	<td>{{ $suscripcion->numerofactura }}</td>
	<td>{{ $suscripcion->estado }}</td>
	<td>-</td>
	
	<td>
	<a class="btn btn-warning" href="{{ route('suscripciones.edit',suscripcion->id) }}">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<!--<td>
	{!! Form::open(['route' => ['anomalias.destroy',$anomalia->id]]) !!}
		<input type="hidden" name="_method" value="DELETE">
		<button onclick="return confirm('Eliminar anomalia ?')" class="btn btn-danger">
		<i class="fa fa-trash-o fa-2x"></i>
		</button>
	{!! Form::close() !!}
	</td>-->
	</tr>
@endforeach

	</tr>

	
</table>

@endsection
