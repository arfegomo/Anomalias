@extends('master')
@section('titulo','Evaluación de calidad de productos')

@section('contenido1')

<b>Informes</b>

@endsection

@section('contenido2')

                <div class="panel panel-default ">
                    <div class="panel-heading">
                        Elija su informe:
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
                                <div class="timeline-badge"><i class="glyphicon glyphicon-hand-right"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('por-grupos') }}"><h4 class="timeline-title">Por grupo de productos</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-hand-right"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('por-productos') }}"><h4 class="timeline-title">Por producto</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-hand-right"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                       <a href="{{ route('por-anomalias') }}"><h4 class="timeline-title">Por anomalía</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-hand-right"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('por-proveedores') }}"><h4 class="timeline-title">Por proveedor</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-hand-right"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('por-tiendas') }}"><h4 class="timeline-title">Por tienda</h4></a>
                                    </div>
                                    <!--<div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>-->
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-hand-right"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('por-estados') }}"><h4 class="timeline-title">Por estado (abiertas/cerradas)</h4></a>
                                    </div>
                                    <!--<div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>-->
                                </div>
                            </li>
                             <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-hand-right"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('resumen') }}"><h4 class="timeline-title">Resumen</h4></h4></a>
                                    </div>
                                    <!--<div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>-->
                                </div>
                            </li>
                            <!--<li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('video-tutoriales') }}"><h4 class="timeline-title">Video tutoriales</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                </div>

@endsection