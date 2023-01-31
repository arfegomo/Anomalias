@extends('master')
@section('titulo','Listado de tiendas')

@section('contenido1')

<b>Listado de tiendas</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('tiendas.create') }}" class="btn btn-primary">Crear tienda</a></div>
<hr>
<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th>Id</th>
   <th>Nombre</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>
@foreach($tiendas as $tienda)
	<td>{{ $tienda->id }}</td>
	<td>{{ $tienda->nombre }}</td>
	<td>
	<a class="btn btn-warning" href="{{ route('tiendas.edit',$tienda->id) }}">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<td>
	{!! Form::open(['route' => ['tiendas.destroy',$tienda->id]]) !!}
		<input type="hidden" name="_method" value="DELETE">
		<button onclick="return confirm('Eliminar tienda ?')" class="btn btn-danger">
		<i class="fa fa-trash-o fa-2x"></i>
		</button>
	{!! Form::close() !!}
	</td>
	</tr>
@endforeach
	
</table>
@endsection