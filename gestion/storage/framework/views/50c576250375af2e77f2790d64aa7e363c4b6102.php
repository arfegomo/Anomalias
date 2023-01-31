<?php $__env->startSection('titulo','Listado de suscripciones'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Listado de suscripciones.</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>
<div align="right"><a href="<?php echo e(route('gruposproductos.create')); ?>" class="btn btn-primary">Registrar suscripcion</a></div>
<hr>

<table width="100%" class="table table-striped table-over" id="dataTables-example">
<thead>
            
   <tr>
   <th># Pedido</th>
   <th>Fecha inicio</th>
   <th>Fecha final</th>
   <th># Factura</th>
   <th>Estado</th>
   <th>Total despachos</th>
   <th colspan="2">Acciones</th>
   </tr>
</thead>
	<tr>

	<td>

	</td>
	</tr>

	
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>