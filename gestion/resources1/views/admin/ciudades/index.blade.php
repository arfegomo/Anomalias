@extends('master')
@section('titulo','Listado de ciudades')

@section('contenido1')

<b>Listado de ciudades</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('ciudades.create') }}" class="btn btn-primary">Crear ciudad</a></div>
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
@foreach($ciudades as $ciudad)
	<td>{{ $ciudad->id }}</td>
	<td>{{ $ciudad->nombre }}</td>
	<td>
	<a class="btn btn-warning" href="{{ route('ciudades.edit',$ciudad->id) }}">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<td>
	{!! Form::open(['route' => ['ciudades.destroy',$ciudad->id]]) !!}
		<input type="hidden" name="_method" value="DELETE">
		<button onclick="return confirm('Eliminar ciudad ?')" class="btn btn-danger">
		<i class="fa fa-trash-o fa-2x"></i>
		</button>
	{!! Form::close() !!}
	</td>
	</tr>
@endforeach
	
</table>
@endsection