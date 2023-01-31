<?php $__env->startSection('titulo','Listado de anomalias'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Informe por estados: </b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<hr>

<table id="table_id" class="display">
<thead>
            
   <tr>
   <th>Estado</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $porestados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $porestado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if($porestado->estado == 1): ?>
    <td><?php echo e("Abiertas"); ?></td>
    <td><?php echo e($porestado->total); ?></td>    
        <?php else: ?>
    <td><?php echo e("Cerradas"); ?></td>
    <td><?php echo e($porestado->total); ?></td>
        
<?php endif; ?>
    </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>

<!--<a href="<?php echo e(route('exportargrupos')); ?>" class="btn btn-info">Exportar</a>-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>