<!DOCTYPE html>
<html>
<head>
	<title>Respueta nueva de anomalía.</title>
</head>
<body>
	<h1>Se ha creado una respuesta para la anomalía # <?php echo e($respuestas); ?></h1>
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
<?php $__currentLoopData = $evaluaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evaluacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<!--<td><?php echo e($evaluacion->id); ?></td>-->
	<td><?php echo e($evaluacion->nombre_tienda); ?></td>
	<td><?php echo e($evaluacion->responsable); ?></td>
	<td><?php echo e($evaluacion->respuesta); ?></td>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
</table>

</body>
</html>