@extends('master')
@section('titulo','Listado de productos')

@section('contenido1')

<b>Listado de productos</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('productos.create') }}" class="btn btn-primary">Crear producto</a></div>
<hr>
<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th>Id</th>
   <th>Nombre</th>
   <th>Grupo</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>
@foreach($productos as $producto)
	<td>{{ $producto->id }}</td>
	<td>{{ $producto->nombre }}</td>
	<td>{{ $producto->grupoproducto->nombre }}</td>
	<td>
	<a class="btn btn-warning" href="{{ route('productos.edit',$producto->id) }}">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<td>
	{!! Form::open(['route' => ['productos.destroy',$producto->id]]) !!}
		<input type="hidden" name="_method" value="DELETE">
		<button onclick="return confirm('Eliminar grupo ?')" class="btn btn-danger">
		<i class="fa fa-trash-o fa-2x"></i>
		</button>
	{!! Form::close() !!}
	</td>
	</tr>
@endforeach
	
</table>
@endsection