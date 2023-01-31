@extends('master')
@section('titulo','Listado de despachos')

@section('contenido1')

<b>Listado de despachos programdos.</b>

@endsection

@section('contenido2')

<div class="row">


<div class="col-md-12">
    
<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th># Pedido</th>       
   <th># Factura</th>     
   <th>Suscripcion</th>    
   <th>Despachos pendientes</th>    
   <th>Pŕoximo despacho</th>
   <th>Libras a enviar</th>
   <th>Observación</th>
   </tr>
</thead>
    <tr>
@foreach($despachos as $despacho)
    <td>{{ $despacho->numeropedido }}</td>
    <td>{{ $despacho->numerofactura }}</td>
    @if ($despacho->tiposuscripcion == 1)
	<td>Trimestral</td>
	@elseif ($despacho->tiposuscripcion == 2)
	<td>Semestral</td>
	@else
	<td>Anual</td>
	@endif
	<td>{{ $despacho->total }}</td>
    <td>{{ $despacho->proximo }}</td>
    <td>{{ $despacho->cantidad }}</td>
    <td>{{ $despacho->observacion }}</td>
    </tr>
@endforeach
    
</table>

</div>

@endsection
