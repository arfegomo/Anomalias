<?php $__env->startSection('titulo','Edite grupos de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Edite grupos de productos</b>

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

<?php echo Form::model($gruposproductos, ['route' => ['gruposproductos.update', $gruposproductos->id],'method'=>'PUT']); ?>

	<div class="col-md-6">
		
    <div class="form-group">
    <label for="Nombre">Nombre:</label>

    <?php echo Form::text('nombre',null,array(
		'class'=>'form-control',
		'required'=>'required',
		'placeholder'=>'Nombre del grupo'
    )); ?>


    </div>
    <?php echo Form::submit('Actualizar grupo', array('class'=>'btn btn-warning')); ?>

    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>