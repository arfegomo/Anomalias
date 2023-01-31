<?php $__env->startSection('titulo','Evaluación de calidad de productos'); ?>

<?php $__env->startSection('contenido1'); ?>

<b>Rutas</b>

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
                                <div class="timeline-badge"><i class="glyphicon glyphicon-pushpin"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('calidad-productos',array('id'=>1))); ?>"><h4 class="timeline-title">Evaluación de productos recibidos</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-link"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="http://186.183.185.116/maquinas/login_maquinas.php" target="_blank"><h4 class="timeline-title">Tickets mantenimiento</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-camera"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                       <a href="http://186.183.185.116/equiposdecomputo/login_sistemas.php" target="_blank"><h4 class="timeline-title">Tickets sistemas</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('formatos-bpm')); ?>"><h4 class="timeline-title">Formatos BPM</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('formato-consignacion')); ?>"><h4 class="timeline-title">Formato registro diario de consignación</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                    </div>
                                </div>
                            </li>
                            <!--<li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('video-tutoriales')); ?>"><h4 class="timeline-title">Video tutoriales</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>