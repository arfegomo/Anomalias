@extends('master')

@section('titulo','Covid-19')

@section('contenido1')

SEGUIMIENTO COVID-19

@endsection

@section('contenido2')

<div class="row">
	<div class="col-md-4">
		<button id="ver1" class="btn btn-link"><i class="glyphicon glyphicon-hand-right"></i> Check list diario de su estado salud COVID 19</button>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<button id="ver2" class="btn btn-link"><i class="glyphicon glyphicon-hand-right"></i> Confirmación de recibido  Medidas de prevención COVID 19 - Sercafe S.A.</button>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<button id="ver3" class="btn btn-link"><i class="glyphicon glyphicon-hand-right"></i> Pdf Medidas de prevención COVID 19 - Sercafe S.A.</button>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12" id="pdf">
<iframe src="{{asset('pdf/Covid19.pdf')}}" width="1024" height="780" frameborder="0" marginheight="0" marginwidth="0"></iframe>
</div>
</div>

<div id="mostrar1" style="display: none">
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfUZ6RB7YgPt7iv4hRTuKLo9DzPiQmLalhPZoO7QK03Y0dx1w/viewform?embedded=true" width="1024" height="768" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
</div>
<div id="mostrar2" style="display: none">
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeUVypGQW3ZbaUufeEyPCz5gLmY3J9fY8uZb70YR3cdlGFvMA/viewform?embedded=true" width="1024" height="768" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
</div>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $("#ver1").on('click', function() {
        $("#pdf").css("display", "none");
        $("#mostrar2").css("display", "none");
        $("#mostrar1").css("display", "");
        return false;
    });

    $("#ver2").on('click', function() {
        $("#mostrar2").css("display", "");
        $("#mostrar1").css("display", "none");
        $("#pdf").css("display", "none");
        return false;
    });

    $("#ver3").on('click', function() {
        $("#mostrar2").css("display", "none");
        $("#mostrar1").css("display", "none");
        $("#pdf").css("display", "");
        return false;
    });
 
});
</script>

@endsection



