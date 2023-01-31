@extends('master')
@section('titulo','Listado de proveedores')

@section('contenido1')

<b>Listado de proveedores</b>

@endsection

@section('contenido2')
<div align="right"><a href="{{ route('proveedores.create') }}" class="btn btn-primary">Crear proveedor</a></div>
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
@foreach($proveedores as $proveedor)
	<td>{{ $proveedor->id }}</td>
	<td>{{ $proveedor->nombre }}</td>
	<td>
	<a class="btn btn-warning" href="{{ route('proveedores.edit',$proveedor->id) }}">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<td>
	<a class="btn btn-success" href="{{ route('proveedores-productos',$proveedor->id) }}">
	<i class="fa fa-folder-open fa-2x"></i>
	</a>
	</td>
	<td>
	{!! Form::open(['route' => ['proveedores.destroy',$proveedor->id]]) !!}
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