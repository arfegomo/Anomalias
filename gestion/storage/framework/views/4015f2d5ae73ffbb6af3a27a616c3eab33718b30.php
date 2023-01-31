<?php $__env->startSection('titulo','Detalle de la suscripcion'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Detalle de la suscripcion</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<hr>
<?php if(session()->has('message')): ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">√ó</button>
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>

<hr>

    <div class="row">
<?php echo Form::open(['' => '']); ?>


<?php echo Form::hidden('idsuscripcion',$detallesuscripcion->id ); ?>

    

    <div class="col-md-4">

     <div class="form-group">
    <?php echo Form::Label('item', '# Pedido:'); ?>

    <?php echo Form::text('numeropedido',$detallesuscripcion->numeropedido, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', '# Factura:'); ?>

    <?php echo Form::text('numerofactura',$detallesuscripcion->numerofactura, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>
    
    <div class="form-group">
    <?php echo Form::Label('item', 'Nombre:'); ?>

    <?php echo Form::text('nombre',$detallesuscripcion->nombre, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Estado:'); ?>

    <?php if($detallesuscripcion->estado == 1): ?>
    <?php echo Form::text('estado','Iniciada', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php else: ?>
    <?php echo Form::text('estado','Finalizada', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php endif; ?>
    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Fecha inicio:'); ?>

    <?php echo Form::text('fechainicio',$detallesuscripcion->fechainicio, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Fecha final:'); ?>

    <?php echo Form::text('fechafinal',$detallesuscripcion->fechafinal, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>
    
    <div class="form-group">
    <?php echo Form::Label('item', 'Tipo:'); ?>

    <?php if($detallesuscripcion->tiposuscripcion == 1): ?>
    <?php echo Form::text('tiposuscripcion','Trimestral', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php elseif($detallesuscripcion->tiposuscripcion == 2): ?>
    <?php echo Form::text('tiposuscripcion','Semestral', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php else: ?>
    <?php echo Form::text('tiposuscripcion','Anual', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php endif; ?>
    </div>
    
     <div class="form-group">
    <?php echo Form::Label('item', 'Tipo de molienda:'); ?>

    <?php if($detallesuscripcion->molienda == 1): ?>
    <?php echo Form::text('molienda','Grano', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php elseif($detallesuscripcion->molienda == 2): ?>
    <?php echo Form::text('molienda','Fina', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php elseif($detallesuscripcion->molienda == 3): ?>
    <?php echo Form::text('molienda','Media', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php else: ?>
    <?php echo Form::text('molienda','Gruesa', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php endif; ?>
    
    </div>
    
    <div class="form-group">
    <?php echo Form::Label('item', 'Cantidad de libras a enviar X mes:'); ?>

    <?php echo Form::text('cantidad',$detallesuscripcion->cantidad, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>
    
     <div class="form-group">
    <?php echo Form::Label('item', 'Observaci®Æn:'); ?>

    <?php echo Form::textarea('observacion',$detallesuscripcion->observacion, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>
    
<?php echo Form::close(); ?>

    

<div class="form-group">
    
<?php echo Form::model($detallesuscripcion, ['route' => ['suscripciones.update', $detallesuscripcion->id],'method'=>'PUT']); ?>


<?php echo Form::hidden('estado',2 ); ?>


<?php echo Form::submit('Cerrar suscripcion', array('class'=>'btn btn-warning btn-block')); ?>


<?php echo Form::close(); ?>


</div>
    
</div>



<div class="col-md-8">
    
<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th>Despachos programados</th>
   <th>Libras enviadas</th>
   <th>Estado</th>
   <th>Lote</th>
   <th>Acciones</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $despachos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $despacho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($despacho->fechadespacho); ?></td>
    <td><?php echo e($despacho->cantidad); ?></td>
    <?php if($despacho->estado == 0): ?>
    <td>Por despachar</td>
    <td>
    <?php echo Form::model($despacho, ['route' => ['despachos.update', $despacho->id],'method'=>'PUT']); ?>

    <div class="form-group">
      
        <div class="input-group date form_date col-md-10" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_lote" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="lote" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_lote" value="" /><br/>
    </div>
    </td>
    <td>
        
    
        <?php echo Form::hidden('estado', 1); ?>

        <?php echo Form::hidden('idsuscripcion', $detallesuscripcion->id); ?>

        <?php echo Form::hidden('correo', $detallesuscripcion->correo); ?>

        <?php echo Form::submit('Despachar', array('class'=>'btn btn-success')); ?>

    


    <?php echo Form::close(); ?>

    
    </td>
    <?php else: ?>

    <td>Despachado</td>
    <td><?php echo e($despacho->lote); ?></td>
    <td>
      
    
    </td>
    <?php endif; ?>
    
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>

<?php if($detallesuscripcion->estado == 1): ?>

<!--<div class="form-group">
    Pr√≥ximo despacho:
    <?php $__currentLoopData = $fechas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($fecha->fecha == ""): ?>
    <td><?php echo e(date('d-m-Y', strtotime($detallesuscripcion->fechainicio. 'next thursday'))); ?></td>
    <?php else: ?>
    <?php echo e($siguientedespacho); ?>

    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>-->


<?php echo Form::open(['route' => 'despachos.store']); ?>


<?php echo Form::hidden('idsuscripcion',$detallesuscripcion->id ); ?>


<div class="form-group">

<?php if($detallesuscripcion->estado == 1): ?>
        
 <?php echo Form::submit('Programar despachos', array('class'=>'btn btn-warning btn-block')); ?>

 
<?php else: ?>

<?php endif; ?>


</div>


    <div class="form-group">
    <?php echo Form::Label('item', 'Libras a enviar:'); ?>

    <?php echo Form::text('cantidad',1, ['class' => 'form-control']); ?>

    </div>
    
    <div class="form-group">
      <label for="fechadespacho">Fecha</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechadespacho" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input" value="" /><br/>
    </div>


<?php echo Form::close(); ?>


<?php else: ?>
<?php endif; ?>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>