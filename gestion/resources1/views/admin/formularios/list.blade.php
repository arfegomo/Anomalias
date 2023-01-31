@extends('master')
@section('titulo','Listado de grupos de productos')

@section('contenido1')

<b>Ver evaluaciones de grupos de productos</b>

@endsection

@section('contenido2')
<!--<div align="right"><a href="{{ route('gruposproductos.create') }}" class="btn btn-primary">Crear grupo</a></div>-->
<hr>
{!!Form::open(['route'=>'ver-evaluaciones','method'=>'GET','class'=>'navbar-form'])!!}
	<div class="form-group">
		{!!Form::text('id',null,['class'=>'form-control','placeholder'=>'Buscar anomalia...'])!!}
		{!! Form::submit('Buscar', array('class'=>'btn btn-warning')) !!}
	</div>
{!!Form::close()!!}
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
	<a class="btn btn-warning" href="{{ route('ver-grupoevaluacion',$grupoproducto->id) }}">
	<i class="fa fa-binoculars fa-2x"></i>
	</a>
	</td>
	</tr>
@endforeach
	
</table>
@endsection