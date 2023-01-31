@extends('master')
@section('titulo','Descuentos Empleados')

@section('contenido1')

<b>Tutorial Aplicar descuento Empleados</b>

@endsection

@section('contenido2')

<iframe src="{{asset('pdf/descuento_empleados.pdf')}}" width="1024" height="780" frameborder="0" marginheight="0" marginwidth="0"></iframe>

@endsection