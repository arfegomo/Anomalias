@extends('master')
@section('titulo','Listado de grupos de productos')

@section('contenido1')

<b>Ver evaluaciones de grupos de productos:</b>

@endsection

@section('contenido2')

<hr>

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@if(session()->has('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session()->get('message') }}
    </div>
@endif

<table id="table_id8" class="display">
<thead>
            
   <tr>
   <th># Anomalía</th>
   <th>Fecha</th>
   <th>Tienda</th>
   <th>Producto</th>
   <th>Respuestas</th>
   <th>Estado</th>
   <th>Acciones</th>
   </tr>
</thead>
	<tr>
@foreach($evaluaciones as $evaluacion)
	<td>{{ $evaluacion->id }}</td>
	<td>{{ $evaluacion->created_at }}</td>
	<td>{{ $evaluacion->nombre_tienda }}</td>
	<td>{{ $evaluacion->nombre_producto }}</td>
	 @if($evaluacion->total > 0)
    <td><i class="glyphicon glyphicon-thumbs-up fa-2x text-danger" style="color:green;"></i> [ {{ $evaluacion->total }} ]</td>
    @else
    <td><i class="glyphicon glyphicon-thumbs-down fa-2x text-danger" style="color:red;"></i> [ {{ $evaluacion->total }} ]</td>
    @endif
	@if($evaluacion->estado == 1)
	<td>{{ "Abierta" }}</td>
	@else
	<td>{{ "Cerrada" }}</td>
	@endif
	<td>
	<a class="btn btn-warning" href="{{ route('ver-detallevaluacion',$evaluacion->id) }}" target="_blank">
	<i class="fa fa-binoculars fa-2x"></i>
	</a>
	</td>
	</tr>
@endforeach
	
</table>

@endsection