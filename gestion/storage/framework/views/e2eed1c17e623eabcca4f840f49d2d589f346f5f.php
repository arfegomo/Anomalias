<?php $__env->startSection('titulo','Listado de grupos de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Listado de grupos de productos</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>
<div align="right"><a href="<?php echo e(route('gruposproductos.create')); ?>" class="btn btn-primary">Crear grupo</a></div>
<hr>
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
	<a class="btn btn-warning" href="<?php echo e(route('gruposproductos.edit',$grupoproducto->id)); ?>">
	<i class="fa fa-pencil-square fa-2x"></i>
	</a>
	</td>
	<td>
	<?php echo Form::open(['route' => ['gruposproductos.destroy',$grupoproducto->id]]); ?>

		<input type="hidden" name="_method" value="DELETE">
		<button onclick="return confirm('Eliminar grupo ?')" class="btn btn-danger">
		<i class="fa fa-trash-o fa-2x"></i>
		</button>
	<?php echo Form::close(); ?>

	</td>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>