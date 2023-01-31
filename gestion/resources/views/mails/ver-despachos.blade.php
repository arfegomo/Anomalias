<!DOCTYPE html>
<html>
<head>
	<title>Recordatorio.</title>
</head>
<body>
	<h>Proximos despachos</h1>
	<p>Por favor ingresa y valida!</p>


<div class="row">


<div class="col-md-12">
    
<table width="100%" >
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


@foreach($despachos as $despacho)
    <tr>
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
