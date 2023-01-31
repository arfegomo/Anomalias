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

<?php echo Form::open(['route' => 'formularios.store','files' => 'true']); ?>


	<div class="col-md-6">

    <div class="form-group">
    <?php echo Form::Label('item', 'Tienda:'); ?>

    <?php echo Form::select('idtienda', $tiendas, null, ['class' => 'form-control','placeholder' => 'Seleccione su tienda...']); ?>

    </div>
    
    <div class="form-group">
    <?php echo Form::Label('item', 'Grupo:'); ?>

    <?php echo Form::select('idgrupo', $gruposproductos, null, ['class' => 'form-control','placeholder' => 'Seleccione un grupo de productos...']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Producto:'); ?>

    <select name="productos" id="productos" data-old="<?php echo e(old('producto_id')); ?>" class="form-control">
        
    </select>
    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Proveedor:'); ?>

    <select name="proveedores" id="proveedores" data-old="<?php echo e(old('proveedor_id')); ?>" class="form-control">
        
    </select>
    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Incidente:'); ?>

    <?php echo Form::select('tipoincidente', ['1' => 'Anomalia','2'=>'Producto no conforme'], null, ['class' => 'form-control','placeholder' => 'Seleccione un incidente...']); ?>

    </div>
    

    <div class="form-group">
    <?php echo Form::Label('item', 'Lote # de remisión:'); ?>

    <?php echo Form::text('lote', null, ['class' => 'form-control']); ?>

    </div>

    <div class="form-group">
      <label for="fechavencimiento">Fecha de vencimiento</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechavencimiento" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>
         


    <!--<div class="form-group">
    <?php echo Form::Label('item', 'Fecha de vencimiento:'); ?>

    <?php echo Form::text('fechavencimiento', null, ['class' => 'form-control']); ?>

    </div>-->

    <div id="contenedor">
    <div class="form-group">
    <?php echo Form::Label('item', 'Anomalia:'); ?>

    </div>
    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Observación:'); ?>

    <?php echo Form::textarea('observacion', null, ['class' => 'form-control','placeholder' => 'Detalle la observación de la anomalía...']); ?>

    </div>
    
    <br>

    <div class="form-group">
    <?php echo Form::Label('item', 'Identificado por:'); ?>

    <?php echo Form::select('momento',['1' => 'Promotora de venta','2' => 'Auditoría', '3' => 'Cliente Institucional'],null,['class' => 'form-control','placeholder' => 'Elija...']); ?>

    </div>
    
    <div class="form-group">
    <?php echo Form::Label('item', 'Nombre y apellidos completos promotora / Vendedor:'); ?>

    <?php echo Form::text('promotora', null, ['class' => 'form-control']); ?>

    </div>

    <div class="form-group">
    <?php echo Form::Label('item', 'Adjunte imágen (No adjuntar, en desarrollo!!!):'); ?>

    <?php echo Form::file('imagen', null, ['class' => 'form-control']); ?>

    </div>

    <br>
   
</div>

<div class="col-md-6" id="producto-no">
    
    <div class="form-group">
      <label for="fechaidentificacion">Fecha de identificación:</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechaidentificacion" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>

     <div class="form-group">
    <?php echo Form::Label('item', 'Lugar donde se identificó:'); ?>

    <?php echo Form::select('lugaridentificado',['1' => 'Recepción','2' => 'Alamacenado o exhibido', '3' => 'Entrega al cliente'],null,['class' => 'form-control','placeholder' => 'Elija...']); ?>

    </div>

    <div class="form-group">
      <label for="fecharecepcion">Fecha de recepción:</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fecharecepcion" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>


    <div class="form-group">
    <?php echo Form::Label('cantidad', 'Cantidad:'); ?>

    <?php echo Form::text('cantidad', null, ['class' => 'form-control']); ?>

    </div>

    </div>


    <div class="form-group">
    <?php echo Form::submit('Guardar evaluación', array('class'=>'btn btn-warning')); ?>

    </div>
    <?php echo Form::close(); ?>


<div class="col-md-6">
    <a class="" href="<?php echo e(route('ver-grupoevaluacion-all')); ?>">
            <span class="fa fa-arrow-right">&nbsp;</span> Ver mis evaluaciones
    </a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>