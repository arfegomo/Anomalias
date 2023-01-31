@extends('master')
@section('titulo','Evaluación de calidad de productos')

@section('contenido1')

<b>Informe por productos</b>

@endsection

@section('contenido2')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<hr>
@if(session()->has('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session()->get('message') }}
    </div>
@endif

{!! Form::open(array('url' => 'informe-productos')) !!}

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
    {!! Form::submit('Consultar', array('class'=>'btn btn-warning')) !!}
    </div>

@endsection