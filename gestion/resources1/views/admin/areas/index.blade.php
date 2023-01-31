@extends('master')
@section('titulo','Listado de áreas')

@section('contenido1')

<b>Listado de áreas</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('areas.create') }}" class="btn btn-primary">Crear área</a></div>
<hr>
<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th>Id</th>
   <th>Nombre</th>
   <th>Responsable</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>
@foreach($areas as $area)
	<td>{{ $area->id }}</td>
	<td>{{ $area->nombre }}</td>
	<td>{{ $area->responsable }}</td>
	<td>
	<a class="btn btn-warning" href="{{ route('areas.edit',$area->id) }}">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<td>
	{!! Form::open(['route' => ['areas.destroy',$area->id]]) !!}
		<input type="hidden" name="_method" value="DELETE">
		<button onclick="return confirm('Eliminar área ?')" class="btn btn-danger">
		<i class="fa fa-trash-o fa-2x"></i>
		</button>
	{!! Form::close() !!}
	</td>
	</tr>
@endforeach
	
</table>
@endsection