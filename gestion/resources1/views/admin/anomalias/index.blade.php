@extends('master')
@section('titulo','Listado de anomalias')

@section('contenido1')

<b>Listado de anomalias</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('anomalias.create') }}" class="btn btn-primary">Crear anomalia</a></div>
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
@foreach($anomalias as $anomalia)
	<td>{{ $anomalia->id }}</td>
	<td>{{ $anomalia->nombre }}</td>
	<td>
	<a class="btn btn-warning" href="{{ route('anomalias.edit',$anomalia->id) }}">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<td>
	{!! Form::open(['route' => ['anomalias.destroy',$anomalia->id]]) !!}
		<input type="hidden" name="_method" value="DELETE">
		<button onclick="return confirm('Eliminar anomalia ?')" class="btn btn-danger">
		<i class="fa fa-trash-o fa-2x"></i>
		</button>
	{!! Form::close() !!}
	</td>
	</tr>
@endforeach
	
</table>
@endsection