@extends('master')
@section('titulo','Detalle de la suscripcion')

@section('contenido1')

<b>Detalle de la suscripcion</b>

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
        <button type="button" class="close" data-dismiss="alert">Ã—</button>
        {{ session()->get('message') }}
    </div>
@endif

<hr>

    <div class="row">
{!! Form::open(['' => '']) !!}

{!! Form::hidden('idsuscripcion',$detallesuscripcion->id ) !!}
    

    <div class="col-md-5">

     <div class="form-group">
    {!! Form::Label('item', '# Pedido:') !!}
    {!! Form::text('numeropedido',$detallesuscripcion->numeropedido, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', '# Factura:') !!}
    {!! Form::text('numerofactura',$detallesuscripcion->numerofactura, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Estado:') !!}
    @if ($detallesuscripcion->estado == 1)
    {!! Form::text('estado','Iniciada', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @else
    {!! Form::text('estado','Finalizada', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @endif
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Fecha inicio:') !!}
    {!! Form::text('fechainicio',$detallesuscripcion->fechainicio, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
    {!! Form::Label('item', 'Fecha final:') !!}
    {!! Form::text('fechafinal',$detallesuscripcion->fechafinal, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>
    
    <div class="form-group">
    {!! Form::Label('item', 'Tipo:') !!}
    @if ($detallesuscripcion->tiposuscripcion == 1)
    {!! Form::text('tiposuscripcion','Trimestral', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @elseif ($detallesuscripcion->tiposuscripcion == 2)
    {!! Form::text('tiposuscripcion','Semestral', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @else
    {!! Form::text('tiposuscripcion','Anual', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @endif
    </div>
    
     <div class="form-group">
    {!! Form::Label('item', 'Tipo de molienda:') !!}
    @if ($detallesuscripcion->molienda == 1)
    {!! Form::text('molienda','Grano', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @elseif ($detallesuscripcion->molienda == 2)
    {!! Form::text('molienda','Fina', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @elseif ($detallesuscripcion->molienda == 3)
    {!! Form::text('molienda','Media', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @else
    {!! Form::text('molienda','Gruesa', ['class' => 'form-control','readonly' => 'readonly']) !!}
    @endif
    
    </div>
    
    <div class="form-group">
    {!! Form::Label('item', 'Cantidad de libras a enviar X mes:') !!}
    {!! Form::text('cantidad',$detallesuscripcion->cantidad, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>
    
     <div class="form-group">
    {!! Form::Label('item', 'Observaci¨®n:') !!}
    {!! Form::textarea('observacion',$detallesuscripcion->observacion, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>
    
{!! Form::close() !!}
    

<div class="form-group">
    
{!! Form::model($detallesuscripcion, ['route' => ['suscripciones.update', $detallesuscripcion->id],'method'=>'PUT']) !!}

{!! Form::hidden('estado',2 ) !!}

{!! Form::submit('Cerrar suscripcion', array('class'=>'btn btn-warning btn-block')) !!}

{!! Form::close() !!}

</div>
    
</div>



<div class="col-md-7">
    
<table width="50%" class="table table-striped" >
<thead>
            
   <tr>
   <th>Despachos programados</th>
   <th>Libras enviadas</th>
   <th>Estado</th>
   <th>Acciones</th>
   </tr>
</thead>
    <tr>
@foreach($despachos as $despacho)
    <td>{{ $despacho->fechadespacho }}</td>
    <td>{{ $despacho->cantidad }}</td>
    @if ($despacho->estado == 0)
    <td>Por despachar</td>
    <td>
        {!! Form::model($despacho, ['route' => ['despachos.update', $despacho->id],'method'=>'PUT']) !!}
    
        {!! Form::hidden('estado', 1) !!}
        {!! Form::hidden('idsuscripcion', $detallesuscripcion->id) !!}
        {!! Form::hidden('correo', $detallesuscripcion->correo) !!}
        {!! Form::submit('Despachar', array('class'=>'btn btn-success')) !!}
    


    {!! Form::close() !!}
    
    </td>
    @else
    <td>Despachado</td>
    <td>
      
    
    </td>
    @endif
    
    </tr>
@endforeach
    
</table>

@if ($detallesuscripcion->estado == 1)

<!--<div class="form-group">
    PrÃ³ximo despacho:
    @foreach($fechas as $fecha)
    @if($fecha->fecha == "")
    <td>{{ date('d-m-Y', strtotime($detallesuscripcion->fechainicio. 'next thursday')) }}</td>
    @else
    {{ $siguientedespacho }}
    @endif
@endforeach
</div>-->


{!! Form::open(['route' => 'despachos.store']) !!}

{!! Form::hidden('idsuscripcion',$detallesuscripcion->id ) !!}

<div class="form-group">

@if ($detallesuscripcion->estado == 1)
        
 {!! Form::submit('Programar despachos', array('class'=>'btn btn-warning btn-block')) !!}
 
@else

@endif


</div>


    <div class="form-group">
    {!! Form::Label('item', 'Libras a enviar:') !!}
    {!! Form::text('cantidad',1, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
      <label for="fechadespacho">Fecha</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="fechadespacho" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    <input type="hidden" id="dtp_input" value="" /><br/>
    </div>


{!! Form::close() !!}

@else
@endif

</div>

@endsection

