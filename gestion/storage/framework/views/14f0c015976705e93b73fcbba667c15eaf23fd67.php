<?php $__env->startSection('titulo','Manuales'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Manuales</b>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

                <div class="panel panel-default ">
                    <div class="panel-heading">
                        Elija su ruta:
                        <ul class="pull-right panel-settings panel-button-tab-right">
                            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <ul class="dropdown-settings">
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 1
                                            </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 2
                                            </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 3
                                            </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body timeline-container">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-ok"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('descuento-empleado')); ?>"><h4 class="timeline-title">Aplicacion Descuentos Empleado</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>-->
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-ok"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('descarga-nomina')); ?>"><h4 class="timeline-title">Descarga volantes de nómina y certificados laborales</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>-->
                                    </div>
                                </div>
                            </li>
                            
                           
                        </ul>
                    </div>
                </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>