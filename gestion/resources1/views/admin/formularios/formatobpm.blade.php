@extends('master')

@section('titulo','Formato de consignación')

@section('contenido1')

FORMATOS BPM

@endsection

@section('contenido2')

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
                                        <a href="{{ route('formato-1') }}"><h4 class="timeline-title">FORMATO RECEPCIÓN Y TRAZABILIDAD DE MATERIAS PRIMAS E INSUMOS</h4></a>
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
                                        <a href="{{ route('formato-2') }}"><h4 class="timeline-title">FORMATO DE CONTROL DE TEMPERATURA DE REFRIGERACIÓN DE VITRINA EXHIBIDORA</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1XIZFbdHA9hIyydG69ig_myA5zJ8dmXSRY7M7Xp9qeMk/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                       <a href="{{ route('formato-3') }}"><h4 class="timeline-title">FORMATO DE CONTROL DE TEMPERATURA DE REFRIGERACIÓN DE NEVERA</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1qqLTm1P5fUeIiBEBk0Jlsq-3rglGe0N81IVCwx8t8Ug/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('formato-4') }}"><h4 class="timeline-title">FORMATO DE CONTROL DE TEMPERATURA DE CONGELACIÓN</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1TDOUkRriHXy6OyoB7sb2AoXpqhaNwOLEuv9OClp7jBQ/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('formato-5') }}"><h4 class="timeline-title">FORMATO DE CONTROL DE LIMPIEZA Y DESINFECCIÓN</h4></a>
                                    </div>
                                     <div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1Ehf6Ms4BukGU84tu4tHh3JwSiwTVvaBnaqkampc0Q8k/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('formato-6') }}"><h4 class="timeline-title">FORMATO CONTROL DE PRODUCTO NO CONFORME</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1kocch1OfdFxf98AJPMo0M93RQituTWU8nr_ucHqolH8/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('formato-7') }}"><h4 class="timeline-title">FORMATO CONTROL DE DOSIFICACIÓN DE PRODUCTOS DE LIMPIEZA Y DESIFECCIÓN</h4></a>
                                    </div>
                                    <div class="timeline-body">
                                        <a href="https://docs.google.com/spreadsheets/d/1joLdUB-O2VvZT7cdTNqr4E7Y_QptGiPELH_vYJBe0a0/edit?usp=sharing" target="_blank"><h5 class="timeline-title"><i class="glyphicon glyphicon-hand-right"></i> Ver respuestas </h5></a>
                                    </div>
                                </div>
                            </li>
                              <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('formato-11') }}"><h4 class="timeline-title">FORMATO DE CONTROL DE LIMPIEZA Y DESINFECCIÓN FREE ZONE</h4></a>
                                    </div>
                                    
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <a href="{{ route('formato-12') }}"><h4 class="timeline-title">FORMATO CONTROL DE DOSIFICACIÓN DE PRODUCTOS DE LIMPIEZA Y DESIFECCIÓN FREE ZONE</h4></a>
                                    </div>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

@endsection



