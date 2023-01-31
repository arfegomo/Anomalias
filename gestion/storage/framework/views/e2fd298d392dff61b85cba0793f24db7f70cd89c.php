<?php $__env->startSection('titulo','Evaluación de calidad de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Informe por productos</b>

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

<?php echo Form::open(array('url' => 'informe-productos')); ?>


	<div class="col-md-6">

    <div class="form-group">
      <label for="fecha">Elija el mes</label>
        <div class="input-group date form_date2 col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fecha" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input2" value="" /><br/>
    </div>

    <div class="form-group">
    <?php echo Form::submit('Consultar', array('class'=>'btn btn-warning')); ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>