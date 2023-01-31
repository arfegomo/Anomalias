<?php $__env->startSection('titulo','Listado de grupos de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Ver evaluaciones de grupos de productos:</b>
<?php $__currentLoopData = $gruposproductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoproducto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<b><?php echo e($grupoproducto->nombre); ?></b>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>
<!--<div align="right"><a href="<?php echo e(route('gruposproductos.create')); ?>" class="btn btn-primary">Crear grupo</a></div>-->
<hr>

<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th># Evaluación</th>
   <th>Fecha</th>
   <th>Tienda</th>
   <th>Producto</th>
   <th>Estado</th>
   <th colspan="2">Acciones</th>
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
	<td>
	<a class="btn btn-warning" href="<?php echo e(route('ver-detallevaluacion',$evaluacion->id)); ?>">
	<i class="fa fa-binoculars fa-2x"></i>
	</a>
	</td>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>