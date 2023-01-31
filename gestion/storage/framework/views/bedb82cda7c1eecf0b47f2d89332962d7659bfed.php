<?php $__env->startSection('titulo','Listado de grupos de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Ver evaluaciones de grupos de productos:</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<hr>

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<?php if(session()->has('message')): ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>

<table id="table_id" class="display">
<thead>
            
   <tr>
   <th># Anomalía</th>
   <th>Fecha</th>
   <th>Tienda</th>
   <th>Producto</th>
   <th>Estado</th>
   <th>Acciones</th>
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