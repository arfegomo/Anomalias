<?php $__env->startSection('titulo','Listado de anomalias'); ?>

<?php $__env->startSection('contenido1'); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">

<div class="row"> 
<div class="col-md-2">
<div class="form-group">
<a href="<?php echo e(route('consolidado-gerencia')); ?>" class="btn btn-success">Ver resumen Gerencia</a>
</div>
</div>

</div>
<hr>

<div class="row">
<div class="col-md-6">

<table id="table_id" class="display">
<thead>
<tr>
 <th rowspan="2">Consolidado</th> 
 <th colspan="6">Mes</th> 
 
</tr>     
   <tr>
   
   <?php $__currentLoopData = $consolidados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consolidado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <th><?php echo e($consolidado->month); ?> / <?php echo e($consolidado->year); ?></th>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
   </tr>
</thead>

<tbody>
<tr>
<td>Total anomalías:</td>
<?php $__currentLoopData = $consolidados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consolidado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <td><?php echo e($consolidado->total); ?></td>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
</tr>
<tr>

<td>Anomalías abiertas:</td>
<?php $__currentLoopData = $abiertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abierta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <td><?php echo e($abierta->total); ?></td>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

 </tr> 

<tr>
<td>Anomalías cerradas</td>
<?php $__currentLoopData = $cerradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cerrada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <td><?php echo e($cerrada->total); ?></td>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

 </tr>   
</tbody>
</table>
</div>
</div>

<!--
<div class="row">

<?php echo Form::open(['route' => 'formularios.store']); ?>


	<div class="col-md-6">

    <div class="form-group">
    <?php echo Form::Label('item', 'Proveedor:'); ?>

    <?php echo Form::select('idproveedor', $proveedor, null, ['class' => 'form-control','placeholder' => 'Elija el proveedor...']); ?>

    </div>

<?php echo Form::close(); ?>

</div>
</div>
-->


<table id="Table">
	
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>