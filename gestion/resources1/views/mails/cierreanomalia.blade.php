<!DOCTYPE html>
<html>
<head>
	<title>Ticket nuevo de anomalía.</title>
</head>
<body>
	<h1>Se ha cerrado un ticket de anomalía # {{ $id }} </h1>
	<p>Por favor ingresa y valida!</p>

<table id="table_id" class="display">
<thead>
            
   <tr>
   <th># Anomalía</th>
   <th>Fecha</th>
   <th>Tienda</th>
   <th>Producto</th>
   <th>Estado</th>
   </tr>
</thead>
	<tr>
@foreach($evaluaciones as $evaluacion)
	<td>{{ $evaluacion->id }}</td>
	<td>{{ $evaluacion->created_at }}</td>
	<td>{{ $evaluacion->nombre_tienda }}</td>
	<td>{{ $evaluacion->nombre_producto }}</td>
	@if($evaluacion->estado == 1)
	<td>{{ "Abierta" }}</td>
	@else
	<td>{{ "Cerrada" }}</td>
	@endif
	</tr>
@endforeach
	
</table>
</body>
</html>