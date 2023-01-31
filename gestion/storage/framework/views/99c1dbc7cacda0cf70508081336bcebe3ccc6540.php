<?php $__env->startSection('titulo','Listado de suscripciones'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Listado de suscripciones.</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>
<div align="right"><a href="<?php echo e(route('ver-despachos')); ?>">Ver pŕoximos despachos</a>
<a href="<?php echo e(route('suscripciones.create')); ?>" class="btn btn-primary">Registrar suscripcion</a></div>
<hr>

<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th># Pedido</th>
   <th>Fecha inicio</th>
   <th>Fecha final</th>
   <th>Tipo</th>
   <th># Factura</th>
   <th>Estado</th>
   <th>Despachos programados</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>

<?php $__currentLoopData = $suscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suscripcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<td><?php echo e($suscripcion->numeropedido); ?></td>
	<td><?php echo e($suscripcion->fechainicio); ?></td>
	<td><?php echo e($suscripcion->fechafinal); ?></td>
	
	<?php if($suscripcion->tiposuscripcion == 1): ?>
	<td>Trimestral</td>
	<?php elseif($suscripcion->tiposuscripcion == 2): ?>
	<td>Semestral</td>
	<?php else: ?>
	<td>Anual</td>
	<?php endif; ?>
	
	
	<td><?php echo e($suscripcion->numerofactura); ?></td>
	
	<?php if($suscripcion->estado == 1): ?>
	<td>Iniciada</td>
	<?php else: ?>
	<td>Finalizada</td>
	<?php endif; ?>
	
	<td><?php echo e($suscripcion->total); ?></td>
	
	<td>
	<a class="btn btn-warning" href="<?php echo e(route('ver-detallesuscripcion',$suscripcion->id)); ?>">
	<i class="fa fa-binoculars fa-2x"></i>
	</a>
	</td>
	
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>