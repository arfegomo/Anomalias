@extends('master')
@section('titulo','Listado de anomalias')

@section('contenido1')
 
@endsection

@section('contenido2')

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">

<div class="row"> 
<div class="col-md-2">
<div class="form-group">
<a href="{{ route('consolidado-gerencia') }}" class="btn btn-success">Ver resumen Gerencia</a>
</div>
</div>

</div>
<hr>

<div class="row">
<div class="col-md-6">

<table id="table_id" class="display">
<thead>
<tr>
 <th rowspan="2">Consolidado</th> 
 <th colspan="6">Mes</th> 
 
</tr>     
   <tr>
   
   @foreach($consolidados as $consolidado)
      <th>{{ $consolidado->month }} / {{ $consolidado->year }}</th>
   @endforeach 
   </tr>
</thead>

<tbody>
<tr>
<td>Total anomalías:</td>
@foreach($consolidados as $consolidado)
    
    <td>{{ $consolidado->total }}</td>

@endforeach  
</tr>
<tr>

<td>Anomalías abiertas:</td>
@foreach($abiertas as $abierta)
    
    <td>{{ $abierta->total }}</td>

@endforeach  

 </tr> 

<tr>
<td>Anomalías cerradas</td>
@foreach($cerradas as $cerrada)
    
    <td>{{ $cerrada->total }}</td>

@endforeach  

 </tr>   
</tbody>
</table>
</div>
</div>

<!--
<div class="row">

{!! Form::open(['route' => 'formularios.store']) !!}

	<div class="col-md-6">

    <div class="form-group">
    {!! Form::Label('item', 'Proveedor:') !!}
    {!! Form::select('idproveedor', $proveedor, null, ['class' => 'form-control','placeholder' => 'Elija el proveedor...']) !!}
    </div>

{!! Form::close() !!}
</div>
</div>
-->


<table id="Table">
	
</table>

@endsection
