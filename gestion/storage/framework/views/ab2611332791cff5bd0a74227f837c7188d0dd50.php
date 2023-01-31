<?php $__env->startSection('titulo','Registrar anomalía'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Crear suscripciones</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>
<hr>

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

<?php echo Form::open(['route' => 'suscripciones.store']); ?>

	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Pedido"># Pedido:</label>

    <?php echo Form::text('numeropedido',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'# del pedido'
    )); ?>


    </div>
    
    <div class="form-group">
    <label for="Factura"># Factura:</label>

    <?php echo Form::text('numerofactura',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'# de factura'
    )); ?>


    </div>
    
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    <?php echo Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre'
    )); ?>


    </div>
    
     <div class="form-group">
    <label for="Correo">Correo del cliente:</label>

    <?php echo Form::text('correo',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Correo del cliente'
    )); ?>


    </div>
    
    <div class="form-group">
      <label for="fechainicio">Fecha de inicio</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechainicio" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>
    
    <div class="form-group">
      <label for="fechafinal">Fecha final</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechafinal" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    <input type="hidden" id="dtp_input1" value="" /><br/>
    </div>
    
    
    </div>
    
    <div class="col-md-6">
    
    <div class="form-group">
    <?php echo Form::Label('item', 'Estado:'); ?>

    <?php echo Form::select('estado',['1' => 'Iniciada','2' => 'Finalizada'],null,['class' => 'form-control','placeholder' => 'Elija...']); ?>

    </div>
    
    <div class="form-group">
    <?php echo Form::Label('item', 'Tipo de suscripcion:'); ?>

    <?php echo Form::select('tiposuscripcion',['1' => 'Trimestral','2' => 'Semestral','3' => 'Anual'],null,['class' => 'form-control','placeholder' => 'Elija...']); ?>

    </div>
    
     <div class="form-group">
    <?php echo Form::Label('item', 'Tipo de molienda:'); ?>

    <?php echo Form::select('molienda',['1' => 'Grano','2' => 'Fina','3' => 'Media', '4' => 'Gruesa'],null,['class' => 'form-control','placeholder' => 'Elija...']); ?>

    </div>
    
    <div class="form-group">
    <label for="Pedido">Cantidad a enviar x mes:</label>

    <?php echo Form::text('cantidad',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'cantidad'
    )); ?>


    </div>
   
     <div class="form-group">
    <?php echo Form::submit('Guardar suscripcion', array('class'=>'btn btn-warning btn-block')); ?>

    </div>    
    
    </div>
    
   
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>