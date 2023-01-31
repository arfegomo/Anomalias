<?php $__env->startSection('titulo','Formato de consignación'); ?>

<?php $__env->startSection('contenido1'); ?>

FORMATOS MERCADEO

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido2'); ?>

<div class="panel panel-default ">
                    <div class="panel-heading">
                        Elija el formato:
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
                            <!--<li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('formato-1')); ?>"><h4 class="timeline-title">FORMATO RECEPCIÓN Y TRAZABILIDAD DE MATERIAS PRIMAS E INSUMOS</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                    </div>
                                </div>
                            </li>-->
                             <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('aumento-seguidores')); ?>"><h4 class="timeline-title">Camapaña Aumento Seguidores</h4></a>
                                    </div>
                                     <div class="timeline-body">
 <a href="https://docs.google.com/spreadsheets/d/1AcxI_nOP-_BVNZGqylyHydtjK1JEGC-JZ4riphfjI14/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
 </div>
                                </div>
                            </li>

                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('formato-8')); ?>"><h4 class="timeline-title">CONTROL ENTREGA DE TARJETAS</h4></a>
                                    </div>
                                    <!--<div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1XIZFbdHA9hIyydG69ig_myA5zJ8dmXSRY7M7Xp9qeMk/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>-->
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                       <a href="<?php echo e(route('formato-9')); ?>"><h4 class="timeline-title">CONTROL DE SELLOS</h4></a>
                                    </div>
                                    <!--<div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1qqLTm1P5fUeIiBEBk0Jlsq-3rglGe0N81IVCwx8t8Ug/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>-->
                                </div>
                            </li>
                            
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('formato-10')); ?>"><h4 class="timeline-title">CONTROL DE BEBIDAS</h4></a>
                                    </div>
                                     <!--<div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1Ehf6Ms4BukGU84tu4tHh3JwSiwTVvaBnaqkampc0Q8k/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>-->
                                </div>
                            </li>
 							<li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-hand-right"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="<?php echo e(route('calidad-productos',array('id'=>2))); ?>"><h4 class="timeline-title">Reportar anomalía mercadeo</h4></a>
                                    </div>
                                     <!--<div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1Ehf6Ms4BukGU84tu4tHh3JwSiwTVvaBnaqkampc0Q8k/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>-->
                                </div>
                            </li>                          
                        </ul>
                    </div>
                </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>