@extends('master')
@section('titulo','Listado de anomalias')

@section('contenido1')

<b>Informe por estados: </b>

@endsection

@section('contenido2')

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<hr>

<table id="table_id" class="display">
<thead>
            
   <tr>
   <th>Estado</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($porestados as $porestado)

@if($porestado->estado == 1)
    <td>{{ "Abiertas" }}</td>
    <td>{{ $porestado->total }}</td>    
        @else
    <td>{{ "Cerradas" }}</td>
    <td>{{ $porestado->total }}</td>
        
@endif
    </tr>

@endforeach
    
</table>

<!--<a href="{{ route('exportargrupos') }}" class="btn btn-info">Exportar</a>-->
@endsection
