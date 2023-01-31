<!DOCTYPE html>
<html>
<head>
	<title>Ticket nuevo de suscripcion.</title>
</head>
<body>
	<h1>Se ha registrado una nueva suscripcion</h1>
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
   <th>Total despachos realizados</th>
   <th>Libras a enviar x mes</th>
   </tr>
</thead>
	<tr>

<?php $__currentLoopData = $suscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suscripcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<td><?php echo e($suscripcion->numeropedido); ?></td>
	<td><?php echo e($suscripcion->numerofactura); ?></td>
	<td><?php echo e($suscripcion->fechainicio); ?></td>
	<td><?php echo e($suscripcion->fechafinal); ?></td>
	
	<?php if($suscripcion->tiposuscripcion == 1): ?>
	<td>Trimestral</td>
	<?php elseif($suscripcion->tiposuscripcion == 2): ?>
	<td>Semestral</td>
	<?php else: ?>
	<td>Anual</td>
	<?php endif; ?>
	
	<?php if($suscripcion->molienda == 1): ?>
	<td>Grano</td>
	<?php elseif($suscripcion->molienda == 2): ?>
	<td>Fina</td>
	<?php elseif($suscripcion->molienda == 3): ?>
	<td>Media</td>
	<?php else: ?>
	<td>Gruesa</td>
	<?php endif; ?>
	
	<?php if($suscripcion->estado == 1): ?>
	<td>Iniciada</td>
	<?php else: ?>
	<td>Finalizada</td>
	<?php endif; ?>
	
	<td><?php echo e($suscripcion->total); ?></td>
	<td><?php echo e($suscripcion->cantidad); ?></td>
	
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	
</table>

</body>
</html>