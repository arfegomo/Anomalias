@extends('master')
@section('titulo','Listado de grupos de productos')

@section('contenido1')

<b>Listado de grupos de productos</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('gruposproductos.create') }}" class="btn btn-primary">Crear grupo</a></div>
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
@foreach($gruposproductos as $grupoproducto)
	<td>{{ $grupoproducto->id }}</td>
	<td>{{ $grupoproducto->nombre }}</td>
	<td>
	<a class="btn btn-warning" href="{{ route('gruposproductos.edit',$grupoproducto->id) }}">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<td>
	{!! Form::open(['route' => ['gruposproductos.destroy',$grupoproducto->id]]) !!}
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