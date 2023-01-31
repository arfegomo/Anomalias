@extends('master')
@section('titulo','Listado de productos')

@section('contenido1')

<b>Informe por productos: </b>

@endsection

@section('contenido2')

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<hr>

<table id="table_id" class="display">
<thead>
            
   <tr>
   <th>Producto</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
@foreach($porproductos as $porproducto)
    <td>{{ $porproducto->nombre }}</td>
    <td>{{ $porproducto->total }}</td>
    </tr>
@endforeach
    
</table>

<!--<a href="{{ route('exportargrupos') }}" class="btn btn-info">Exportar</a>-->
@endsection
