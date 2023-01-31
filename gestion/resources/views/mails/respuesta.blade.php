<!DOCTYPE html>
<html>
<head>
	<title>Respueta nueva de anomalía.</title>
</head>
<body>
	<h1>Se ha creado una respuesta para la anomalía # {{ $respuestas }}</h1>
	<p>Por favor ingresa y valida!</p>
	
<table id="example" style="width:100%">
<thead>
            
   <tr>
   <!--<th># Anomalía</th>-->
   <th>Tienda</th>
   <th>Responsable</th>
   <th>Respuesta</th>
   <!--<th>Estado</th>-->
   </tr>
</thead>
	<tr>
@foreach($evaluaciones as $evaluacion)
	<!--<td>{{ $evaluacion->id }}</td>-->
	<td>{{ $evaluacion->nombre_tienda }}</td>
	<td>{{ $evaluacion->responsable }}</td>
	<td>{{ $evaluacion->respuesta }}</td>
	</tr>
@endforeach
	
</table>

</body>
</html>