@extends('master')
@section('titulo','Listado de anomalias')

@section('contenido1')

<b>Informe por anomalias: </b>

@endsection

@section('contenido2')

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<hr>

<table id="table_id" class="display">
<thead>
            
   <tr>
   <th>Anomlia</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($poranomalias as $poranomalia)
    <td>{{ $poranomalia->nombre }}</td>
    <td>{{ $poranomalia->total }}</td>
    </tr>
@endforeach
    
</table>

<!--<a href="{{ route('exportargrupos') }}" class="btn btn-info">Exportar</a>-->
@endsection
