<!DOCTYPE html>
<html>
<head>
	<title>Ticket nuevo de despacho.</title>
</head>
<body>
	<h1>Se ha enviado un nuevo despacho</h1>
	<p>Por favor ingresa y valida!</p>

<table id="table_id" class="display">
<thead>
            
   <tr>
   <th># Pedido</th>
   <th># Factura</th>
   <th>Fecha inicio</th>
   <th>Fecha final</th>
   <th>Tipo</th>
   <th>Molienda</th>
   <th>Estado</th>
   <th>Total despachos programados</th>
   <th>Libras a enviar</th>
   </tr>
</thead>
	<tr>

@foreach($suscripciones as $suscripcion)

	<td>{{ $suscripcion->numeropedido }}</td>
	<td>{{ $suscripcion->numerofactura }}</td>
	<td>{{ $suscripcion->fechainicio }}</td>
	<td>{{ $suscripcion->fechafinal }}</td>
	
	@if ($suscripcion->tiposuscripcion == 1)
	<td>Trimestral</td>
	@elseif ($suscripcion->tiposuscripcion == 2)
	<td>Semestral</td>
	@else
	<td>Anual</td>
	@endif
	
	@if ($suscripcion->molienda == 1)
	<td>Grano</td>
	@elseif ($suscripcion->molienda == 2)
	<td>Fina</td>
	@elseif ($suscripcion->molienda == 3)
	<td>Media</td>
	@else
	<td>Gruesa</td>
	@endif
	
	@if ($suscripcion->estado == 1)
	<td>Iniciada</td>
	@else
	<td>Finalizada</td>
	@endif
	
	<td>{{ $suscripcion->total }}</td>
	<td>{{ $suscripcion->totalibras }}</td>
	
</tr>
@endforeach

	
</table>
<div class="col-md-6">
    
<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th>Despachos realizados a la fecha</th>
   <th>Libras enviadas</th>
   </tr>
</thead>

@foreach($despachos as $despacho)
    <tr>
    <td>{{ $despacho->fechadespacho }}</td>
    <td>{{ $despacho->cantidad }}</td>
    </tr>
@endforeach
    
</table>

</div>

</body>
</html>