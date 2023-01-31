<?php $__env->startSection('titulo','Listado de despachos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Listado de despachos programdos.</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<div class="row">


<div class="col-md-12">
    
<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th># Pedido</th>       
   <th># Factura</th>     
   <th>Suscripcion</th>    
   <th>Despachos pendientes</th>    
   <th>Pŕoximo despacho</th>
   <th>Libras a enviar</th>
   <th>Observación</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $despachos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $despacho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($despacho->numeropedido); ?></td>
    <td><?php echo e($despacho->numerofactura); ?></td>
    <?php if($despacho->tiposuscripcion == 1): ?>
	<td>Trimestral</td>
	<?php elseif($despacho->tiposuscripcion == 2): ?>
	<td>Semestral</td>
	<?php else: ?>
	<td>Anual</td>
	<?php endif; ?>
	<td><?php echo e($despacho->total); ?></td>
    <td><?php echo e($despacho->proximo); ?></td>
    <td><?php echo e($despacho->cantidad); ?></td>
    <td><?php echo e($despacho->observacion); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>