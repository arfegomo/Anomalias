<?php $__env->startSection('titulo','Edite áreas'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Edite áreas</b>

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

<?php echo Form::model($areas, ['route' => ['areas.update', $areas->id],'method'=>'PUT']); ?>

	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    <?php echo Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre anomalia'
    )); ?>


    </div>
	
	<div class="form-group">
    <label for="Responsable">Responsable:</label>

    <?php echo Form::text('responsable',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Responsable'
    )); ?>


    </div>

    <div class="form-group">
    <label for="Correo">Correo:</label>

    <?php echo Form::text('correo',null,array(
        'class'=>'form-control',
        'required'=>'required',
        'placeholder'=>'Correo'
    )); ?>


    </div>

    <?php echo Form::submit('Actualizar anomalia', array('class'=>'btn btn-warning')); ?>

    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>