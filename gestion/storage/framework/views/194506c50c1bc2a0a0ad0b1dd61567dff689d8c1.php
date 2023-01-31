<?php $__env->startSection('titulo','Listado de anomalias'); ?>

<?php $__env->startSection('contenido1'); ?>
 
<?php $__currentLoopData = $fechas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<h2><strong>Resumen anomalías
<?php if($fecha['estado'] == 1): ?>
<?php echo e('Abiertas:'); ?>

<?php elseif($fecha['estado'] == 2): ?>
<?php echo e('Cerradas:'); ?>

<?php else: ?>
<?php echo e('Consolidado'); ?>

<?php endif; ?>
<?php echo e($fecha['inicio']); ?> a <?php echo e($fecha['fin']); ?>

</strong></h2>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">

<div class="row"> 
<div class="col-md-2">
<div class="form-group">

<div class="col-md-1">
<div class="form-group">
<?php echo Form::open(array('url' => 'consolidado-gerencia')); ?>

<?php $__currentLoopData = $fechas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <input type="hidden" name="fecha" value="<?php echo e($fecha['inicio']); ?>">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo Form::submit('Resumen Gerencia', array('class'=>'btn btn-warning')); ?>

<?php echo Form::close(); ?>

</div>
</div>
</div>
</div>

<div class="col-md-1">
<div class="form-group">
<?php echo Form::open(array('url' => 'informe-resumen')); ?>

<input type="hidden" name="estado" value="2" > 
<?php $__currentLoopData = $fechas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <input type="hidden" name="fecha" value="<?php echo e($fecha['inicio']); ?>">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo Form::submit('Ver cerradas', array('class'=>'btn btn-warning')); ?>

<?php echo Form::close(); ?>

</div>
</div>

<div class="col-md-1">
<div class="form-group">
<?php echo Form::open(array('url' => 'informe-resumen')); ?>

<input type="hidden" name="estado" value="3" > 
<?php $__currentLoopData = $fechas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <input type="hidden" name="fecha" value="<?php echo e($fecha['inicio']); ?>">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo Form::submit('Consolidado', array('class'=>'btn btn-warning')); ?>

<?php echo Form::close(); ?>

</div>
</div>

<div class="col-md-1">
<div class="form-group">
<?php echo Form::open(array('url' => 'informe-resumen')); ?>

<input type="hidden" name="estado" value="1" > 
<?php $__currentLoopData = $fechas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <input type="hidden" name="fecha" value="<?php echo e($fecha['inicio']); ?>">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo Form::submit('Ver abiertas', array('class'=>'btn btn-warning')); ?>

<?php echo Form::close(); ?>

</div>
</div>

</div>
<hr>
<div class="row">
<table id="table_id" class="display">
<thead>
            
   <tr>
   <th>Id Anomlia</th>
   <th>Fecha solicitud</th>
   <th>Área</th>
   <th>Grupo</th>
   <th>Producto</th>
   <th>Proveedor</th>
   <th>Ciudad</th>
   <th>Tienda</th>
   <th>Días transcurridos</th>
   <th>Respuestas</th>
   <th>Estado</th>
   <th>Acciones</th>
   </tr>
</thead>
    <tr>
    <?php $date = new DateTime(); ?>	
<?php $__currentLoopData = $poranomalias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poranomalia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($poranomalia->id); ?></td>
    <td><?php echo e($poranomalia->created_at); ?></td>
    <td><?php echo e($poranomalia->area); ?></td>
    <td><?php echo e($poranomalia->grupo); ?></td>
    <td><?php echo e($poranomalia->producto); ?></td>
    <td><?php echo e($poranomalia->proveedor); ?></td>
    <td><?php echo e($poranomalia->ciudad); ?></td>
    <td><?php echo e($poranomalia->tienda); ?></td>
    <?php if($poranomalia->estado == 2): ?>
    <td><i class="glyphicon glyphicon-ok-sign fa-2x"></td>
    <?php else: ?>
    <?php 
    $dias = (strtotime($date->format('Y-m-d H:i')) - strtotime($poranomalia->created_at))/86400;
    $dias = round(abs($dias)); //$dias = floor($dias); 
    ?>
    <td><?php echo e($dias); ?></td>
    <?php endif; ?>
    <?php if($poranomalia->total > 0): ?>
    <td><i class="fa fa-thumbs-up fa-2x text-danger" style="color:green;"></i> [ <?php echo e($poranomalia->total); ?> ]</td>
    <?php else: ?>
    <td><i class="fa fa-thumbs-down fa-2x text-danger" style="color:red;"></i> [ <?php echo e($poranomalia->total); ?> ]</td>
    <?php endif; ?>
    <?php if($poranomalia->estado == 1): ?>
    <td><i class="fa fa-envelope-open-o fa-2x"></i></td>    
        <?php else: ?>
    <td><i class="fa fa-envelope fa-2x"></i></td>        
<?php endif; ?>
  <td>
  <a class="btn btn-warning" href="<?php echo e(route('ver-detallevaluacion',$poranomalia->id)); ?>" target="_blank">
  <i class="fa fa-binoculars fa-1x"></i>
  </a>
  </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>
<hr>
<div class="row">
<div class="col-md-4">
<table id="table_id2" class="display" >
<thead>
            
   <tr>
   <th>Grupo</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $porgrupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $porgrupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($porgrupo->nombre); ?></td>
    <td><?php echo e($porgrupo->total); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>

<div class="col-md-4">
<table id="table_id3" class="display">
<thead>
            
   <tr>
   <th>Producto</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $porproductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $porproducto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($porproducto->nombre); ?></td>
    <td><?php echo e($porproducto->total); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>

<div class="col-md-4">
<table id="table_id4" class="display">
<thead>
            
   <tr>
   <th>Anomalia</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $poranomalias2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poranomalia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($poranomalia->nombre); ?></td>
    <td><?php echo e($poranomalia->total); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>

</div>
<hr>
<div class="row">
<div class="col-md-4">
<table id="table_id5" class="display">
<thead>
            
   <tr>
   <th>Proveedor</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $porproveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $porproveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($porproveedor->nombre); ?></td>
    <td><?php echo e($porproveedor->total); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>

<div class="col-md-4">
<table id="table_id6" class="display">
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
</div>

<div class="col-md-4">
<table id="table_id7" class="display">
<thead>
            
   <tr>
   <th>Ciudad</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $porciudades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $porciudad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($porciudad->nombre); ?></td>
    <td><?php echo e($porciudad->total); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>

</div>

<hr>
<div class="row">
<div class="col-md-4">
<table id="table_id10" class="display">
<thead>
            
   <tr>
   <th>Área</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $porareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $porarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($porarea->nombre); ?></td>
    <td><?php echo e($porarea->total); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>
</div>

<hr>
<!--
<div class="row">
<div class="col-md-4">
<table id="table_id9" class="display" >
<thead>
            
   <tr>
   <th>Área</th>
   <th>Total anomalías</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $portiposgrupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portipogrupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($portipogrupo->nombre); ?></td>
    <td><?php echo e($portipogrupo->total); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
</div>
</div>
-->
<!--<a href="<?php echo e(route('exportargrupos')); ?>" class="btn btn-info">Exportar</a>-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>