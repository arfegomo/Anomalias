<?php $__env->startSection('titulo','Descuentos Empleados'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Tutorial Aplicar descuento Empleados</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<iframe src="<?php echo e(asset('pdf/descuento_empleados.pdf')); ?>" width="1024" height="780" frameborder="0" marginheight="0" marginwidth="0"></iframe>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>