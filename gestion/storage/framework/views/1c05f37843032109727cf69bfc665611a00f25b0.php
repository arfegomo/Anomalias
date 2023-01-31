<?php $__env->startSection('titulo','Listado de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Informe por tiendas: </b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<hr>

<table id="table_id" class="display">
<thead>
            
   <tr>
   <th>Tienda</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $portiendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portienda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($portienda->nombre); ?></td>
    <td><?php echo e($portienda->total); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>

<!--<a href="<?php echo e(route('exportargrupos')); ?>" class="btn btn-info">Exportar</a>-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>