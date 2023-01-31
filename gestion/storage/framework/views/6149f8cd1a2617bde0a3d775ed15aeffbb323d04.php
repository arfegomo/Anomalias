<?php $__env->startSection('titulo','Listado de grupos de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Ver evaluaciones de grupos de productos</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>
<!--<div align="right"><a href="<?php echo e(route('gruposproductos.create')); ?>" class="btn btn-primary">Crear grupo</a></div>-->
<hr>
<?php echo Form::open(['route'=>'ver-evaluaciones','method'=>'GET','class'=>'navbar-form']); ?>

	<div class="form-group">
		<?php echo Form::text('id',null,['class'=>'form-control','placeholder'=>'Buscar anomalia...']); ?>

		<?php echo Form::submit('Buscar', array('class'=>'btn btn-warning')); ?>

	</div>
<?php echo Form::close(); ?>

<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th>Id</th>
   <th>Nombre</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>
<?php $__currentLoopData = $gruposproductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoproducto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<td><?php echo e($grupoproducto->id); ?></td>
	<td><?php echo e($grupoproducto->nombre); ?></td>
	<td>
	<a class="btn btn-warning" href="<?php echo e(route('ver-grupoevaluacion',$grupoproducto->id)); ?>">
	<i class="fa fa-binoculars fa-2x"></i>
	</a>
	</td>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>