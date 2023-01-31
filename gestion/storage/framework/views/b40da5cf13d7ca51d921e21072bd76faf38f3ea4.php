<?php $__env->startSection('titulo','Evaluación de calidad de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Evaluación de calidad de productos</b>

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
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>

<hr>

<?php echo Form::open(['route' => 'respuestas.store']); ?>

    
    <div class="row">
    <div class="col-md-6">
    <?php $__currentLoopData = $detalleevaluaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalleevaluacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="form-group">
    <?php echo Form::Label('item', 'Grupo:'); ?>

    <?php echo Form::text('grupo',$detalleevaluacion->nombre_grupo, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Tienda:'); ?>

    <?php echo Form::text('tienda',$detalleevaluacion->nombre_tienda, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Producto:'); ?>

    <?php echo Form::text('producto',$detalleevaluacion->nombre_producto, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Proveedor:'); ?>

    <?php echo Form::text('proveedor',$detalleevaluacion->nombre, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Lote:'); ?>

    <?php echo Form::text('lote',$detalleevaluacion->lote, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Feccha creación anomalía:'); ?>

    <?php echo Form::text('fechaanomalia',$detalleevaluacion->created_at, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Fecha vencimiento producto:'); ?>

    <?php echo Form::text('fechavencimiento',$detalleevaluacion->fechavencimiento, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Identificado por:'); ?>

    <?php if($detalleevaluacion->momento == 1): ?>
    <?php echo Form::text('momento','Promotora de venta', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php elseif($detalleevaluacion->momento == 2): ?>
    <?php echo Form::text('momento','Auditoría', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php else: ?>
    <?php echo Form::text('momento','Cliente Institucional', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php endif; ?>
    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Promotora:'); ?>

    <?php echo Form::text('promotora',$detalleevaluacion->promotora, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Observación:'); ?>

    <?php echo Form::textarea('observacion',$detalleevaluacion->observacion, ['class' => 'form-control','readonly' => 'readonly']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::hidden('idformulario', $detalleevaluacion->id); ?>

    <?php echo Form::hidden('correotienda', $detalleevaluacion->correo_tienda); ?>

    <?php echo Form::hidden('idtienda', $detalleevaluacion->idtienda); ?>

    </div>    

    <div class="form-group">
    <?php echo Form::Label('item', 'Responda: '); ?> 
    <?php echo Form::textarea('respuesta', null, ['class' => 'form-control','placeholder' => 'Detalle su respuesta...']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Responsable:'); ?>

    <?php echo Form::text('responsable',null, ['class' => 'form-control']); ?>

    </div>

    <div class="form-group">
    <?php if($detalleevaluacion->estado==1): ?>
    <?php echo Form::submit('Responder', array('class'=>'btn btn-warning')); ?>

    <?php else: ?>
   
    <?php endif; ?>
    </div>
    <?php echo Form::close(); ?>



    <?php if(Auth::user()->idperfil != 3): ?>
        <?php if($detalleevaluacion->estado==1): ?>
    <?php echo Form::model($detalleevaluacion, ['route' => ['formularios.update', $detalleevaluacion->id],'method'=>'PUT']); ?>

    <div class="form-group">
        <?php echo Form::hidden('estado', 2); ?>

        <?php echo Form::hidden('idtienda', $detalleevaluacion->idtienda); ?>

        <?php echo Form::submit('Cerrar caso', array('class'=>'btn btn-success')); ?>

    </div>
        <?php endif; ?>
    <?php else: ?>
    
    <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo Form::close(); ?>


    </div>

<div class="col-md-6">

<div class="form-group">
    <?php echo Form::Label('item', 'Tipo de incidente:'); ?>

    <?php if($detalleevaluacion->tipoincidente == 1): ?>
    <?php echo Form::text('tipoincidente','Anomalia', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php else: ?>
    <?php echo Form::text('tipoincidente','Producto no conforme', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php endif; ?>
</div>

<div class="form-group">
    <?php echo Form::Label('item', 'Fecha identificación:'); ?>

    <?php echo Form::text('fechaidentificacion',$detalleevaluacion->fechaidentificacion, ['class' => 'form-control','readonly' => 'readonly']); ?>

</div>

<div class="form-group">
    <?php echo Form::Label('item', 'Lugar donde se identificó:'); ?>

    <?php if($detalleevaluacion->lugaridentificado == 1): ?>
    <?php echo Form::text('lugaridentificado','Recepción', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php elseif($detalleevaluacion->lugaridentificado == 2): ?>
    <?php echo Form::text('lugaridentificado','Almacenado o exhibido', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php elseif($detalleevaluacion->lugaridentificado == 3): ?>
    <?php echo Form::text('lugaridentificado','Entrega al cliente', ['class' => 'form-control','readonly' => 'readonly']); ?>

    <?php endif; ?>
</div>

<div class="form-group">
    <?php echo Form::Label('item', 'Fecha de recepción:'); ?>

    <?php echo Form::text('fecharecepcion',$detalleevaluacion->fecharecepcion, ['class' => 'form-control','readonly' => 'readonly']); ?>

</div>

<div class="form-group">
    <?php echo Form::Label('item', 'Cantidad:'); ?>

    <?php echo Form::text('cantidad',$detalleevaluacion->cantidad, ['class' => 'form-control','readonly' => 'readonly']); ?>

</div>

<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th>Anomalias presentadas</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $anomalias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anomalia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($anomalia->nombre); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>

<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th>Responde</th>
   <th>Obs.</th>
   <th>Fecha</th>
   </tr>
</thead>
    <tr>
<?php $__currentLoopData = $respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $respuesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td><?php echo e($respuesta->responsable); ?></td>
    <td><?php echo e($respuesta->respuesta); ?></td>
    <td><?php echo e($respuesta->created_at); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</table>
    
</div>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>