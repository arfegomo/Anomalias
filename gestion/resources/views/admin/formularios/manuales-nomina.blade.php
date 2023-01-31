@extends('master')
@section('titulo','Descarga Volantes Nómina y CErtificados Laborales')

@section('contenido1')

<b>Descarga Volantes Nómina y CErtificados Laborales</b>

@endsection

@section('contenido2')

<iframe src="{{asset('pdf/Manual-Volantes-Web-Certificados-Laborales.pdf')}}" width="1024" height="780" frameborder="0" marginheight="0" marginwidth="0"></iframe>

@endsection