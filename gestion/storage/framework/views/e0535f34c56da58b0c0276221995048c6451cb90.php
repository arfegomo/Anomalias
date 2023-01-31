<!DOCTYPE html>
<html>
<head>
	<title>Recordatorio.</title>
</head>
<body>
	<h>Proximos despachos</h1>
	<p>Por favor ingresa y valida!</p>


<div class="row">


<div class="col-md-12">
    
<table width="100%" >
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


<?php $__currentLoopData = $despachos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $despacho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
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
