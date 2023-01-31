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
	<td><?php echo e($suscripcion->totalibras); ?></td>
	
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	
</table>
<div class="col-md-6">
    
<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th>Despachos realizados a la fecha</th>
   <th>Lote</th>
   <th>Libras enviadas</th>
   </tr>
</thead>

<?php $__currentLoopData = $despachos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $despacho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td><?php echo e($despacho->fechadespacho); ?></td>
    <td><?php echo e($despacho->lote); ?></td>
    <td><?php echo e($despacho->cantidad); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>

</div>

</body>
</html>