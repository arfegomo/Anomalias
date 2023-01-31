<!DOCTYPE html>
<html>
<head>
	<title>Ticket nuevo de anomalía.</title>
</head>
<body>
	<h1>Se ha creado un ticket nuevo de anomalía # <?php echo e($formularios); ?> </h1>
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
<?php $__currentLoopData = $evaluaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evaluacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<td><?php echo e($evaluacion->id); ?></td>
	<td><?php echo e($evaluacion->created_at); ?></td>
	<td><?php echo e($evaluacion->nombre_tienda); ?></td>
	<td><?php echo e($evaluacion->nombre_producto); ?></td>
	<?php if($evaluacion->estado == 1): ?>
	<td><?php echo e("Abierta"); ?></td>
	<?php else: ?>
	<td><?php echo e("Cerrada"); ?></td>
	<?php endif; ?>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
</table>
</body>
</html>