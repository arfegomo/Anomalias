<?php $__env->startSection('titulo','Crear proveedores'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Crear proveedores</b>

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

<?php echo Form::open(['route' => 'proveedores.store']); ?>

	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    <?php echo Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre del proveedor'
    )); ?>


    </div>
    <div class="form-group">
    <label for="nit">Nit/Documento:</label>               
   <?php echo Form::text('nit',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Nit / documento'
    )); ?>


    </div>

    <div class="form-group">
    <label for="nit">Dirección:</label>               
    <?php echo Form::text('direccion',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Dirección del proveedor'
    )); ?>

    </div>

    <div class="form-group">
    <label for="nit">Teléfono:</label>               
    <?php echo Form::text('telefono',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Teléfono del proveedor'
    )); ?>

    </div>

    <div class="form-group">
    <label for="nit">Contacto:</label>               
    <?php echo Form::text('contacto',null,array(
        'class'=>'form-control',
        'placeholder'=>'Contacto del proveedor'
    )); ?>

    </div>

    <div class="form-group">
    <?php echo Form::submit('Guardar proveedor', array('class'=>'btn btn-warning')); ?>

    </div>

    </div>

    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>