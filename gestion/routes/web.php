<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*DB::listen(function($query){
  //Imprimimos la consulta ejecutada
  echo "<pre> {$query->sql } </pre>";
});*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('gruposproductos', 'GruposProductosController');

Route::resource('productos', 'ProductosController');

Route::resource('proveedores', 'ProveedoresController');

Route::resource('ciudades', 'CiudadesController');

Route::resource('tiendas', 'TiendasController');

Route::resource('anomalias', 'AnomaliasController');

Route::resource('areas', 'AreasController');

Route::resource('formularios', 'FormulariosController');

Route::resource('suscripciones', 'SuscripcionesController');

Route::resource('despachos', 'DespachosController');

Route::get('/productosgrupos','FormulariosController@getProductos')->middleware('auth');

Route::get('/proveedoresproductos','FormulariosController@getProveedores')->middleware('auth');

Route::get('/proveedoresconsolidado','FormulariosController@ProveedoresConsolidado')->middleware('auth');

Route::get('/gruposanomalias','FormulariosController@getAnomalias')->middleware('auth');

Route::post('informe-productos','FormulariosController@informeporProductos')->name('informe-productos')->middleware('auth');

Route::post('informe-grupos','FormulariosController@informeporGrupos')->name('informe-grupos')->middleware('auth');

Route::post('informe-anomalias','FormulariosController@informeporAnomalias')->name('informe-anomalias')->middleware('auth');

Route::post('informe-proveedores','FormulariosController@informeporProveedores')->name('informe-proveedores')->middleware('auth');

Route::post('informe-tiendas','FormulariosController@informeporTiendas')->name('informe-tiendas')->middleware('auth');

Route::post('informe-estados','FormulariosController@informeporEstados')->name('informe-estados')->middleware('auth');

Route::post('informe-resumen','FormulariosController@informeResumen')->name('informe-resumen')->middleware('auth');

Route::get('/proveedores/{id}','ProveedoresController@productos')->name('proveedores-productos')->middleware('auth');

Route::get('calidad-productos/{id}', 'FormulariosController@calidad')->name('calidad-productos')->middleware('auth');

Route::get('rutas', 'FormulariosController@rutas')->name('rutas')->middleware('auth');

Route::get('ver-evaluaciones', 'FormulariosController@loadEvaluacion')->name('ver-evaluaciones')->middleware('auth');

Route::get('ver-grupoevaluacion-all', 'FormulariosController@loadGrupoEvaluacionAll')->name('ver-grupoevaluacion-all')->middleware('auth');

Route::get('/ver-grupoevaluacion/{id}', 'FormulariosController@loadGrupoEvaluacion')->name('ver-grupoevaluacion')->middleware('auth');

Route::get('/ver-detallevaluacion/{id}', 'FormulariosController@detalleEvaluacion')->name('ver-detallevaluacion')->middleware('auth');

Route::get('formato-consignacion','FormulariosController@formatoConsignacion')->name('formato-consignacion')->middleware('auth');

Route::get('informes','FormulariosController@informes')->name('informes')->middleware('auth');

Route::get('formatos-bpm','FormulariosController@formatoBPM')->name('formatos-bpm')->middleware('auth');

Route::get('formato-1','FormulariosController@formato1')->name('formato-1')->middleware('auth');

Route::get('formato-2','FormulariosController@formato2')->name('formato-2')->middleware('auth');

Route::get('formato-3','FormulariosController@formato3')->name('formato-3')->middleware('auth');

Route::get('formato-4','FormulariosController@formato4')->name('formato-4')->middleware('auth');

Route::get('formato-5','FormulariosController@formato5')->name('formato-5')->middleware('auth');

Route::get('formato-6','FormulariosController@formato6')->name('formato-6')->middleware('auth');

Route::get('formato-7','FormulariosController@formato7')->name('formato-7')->middleware('auth');

Route::get('formato-8','FormulariosController@formato8')->name('formato-8')->middleware('auth');

Route::get('formato-9','FormulariosController@formato9')->name('formato-9')->middleware('auth');

Route::get('formato-10','FormulariosController@formato10')->name('formato-10')->middleware('auth');

Route::get('formato-11','FormulariosController@formato11')->name('formato-11')->middleware('auth');

Route::get('formato-12','FormulariosController@formato12')->name('formato-12')->middleware('auth');

Route::get('aumento-seguidores','FormulariosController@aumentoSeguidores')->name('aumento-seguidores')->middleware('auth');

Route::get('formatos-mercadeo','FormulariosController@formatosMercadeo')->name('formatos-mercadeo')->middleware('auth');

Route::get('factura-electronica','FormulariosController@FacturaElectronica')->name('factura-electronica')->middleware('auth');

Route::get('formato-8','FormulariosController@formato8')->name('formato-8')->middleware('auth');

Route::get('registro-diario','FormulariosController@registroDiario')->name('registro-diario')->middleware('auth');

Route::get('covid-19-terrazacafe','FormulariosController@Covid19terrazacafe')->name('covid-19-terrazacafe')->middleware('auth');

Route::get('prima-servicios','FormulariosController@prima')->name('prima-servicios')->middleware('auth');

Route::get('video-tutoriales','FormulariosController@videoTutoriales')->name('video-tutoriales')->middleware('auth');

Route::get('por-grupos','FormulariosController@porGrupos')->name('por-grupos')->middleware('auth');

Route::get('por-productos','FormulariosController@porProductos')->name('por-productos')->middleware('auth');

Route::get('por-anomalias','FormulariosController@porAnomalias')->name('por-anomalias')->middleware('auth');

Route::get('por-proveedores','FormulariosController@porProveedores')->name('por-proveedores')->middleware('auth');

Route::get('por-tiendas','FormulariosController@porTiendas')->name('por-tiendas')->middleware('auth');

Route::get('por-estados','FormulariosController@porEstados')->name('por-estados')->middleware('auth');

Route::get('consolidado-gerencia','FormulariosController@Consolidado')->name('consolidado-gerencia')->middleware('auth');

Route::get('resumen','FormulariosController@porresumen')->name('resumen')->middleware('auth');

Route::get('manuales','FormulariosController@manuales')->name('manuales')->middleware('auth');

Route::get('descuento-empleado','FormulariosController@descuento_empleado')->name('descuento-empleado')->middleware('auth');

Route::get('descarga-nomina','FormulariosController@descarga_nomina')->name('descarga-nomina')->middleware('auth');

Route::get('suscripciones','SuscripcionesController@suscripciones')->name('suscripciones')->middleware('auth');

Route::get('ver-despachos','SuscripcionesController@despachos')->name('ver-despachos')->middleware('auth');

Route::get('/ver-detallesuscripcion/{id}','SuscripcionesController@edit')->name('ver-detallesuscripcion')->middleware('auth');

Route::get('exportargrupos',['as' => 'exportargrupos', 'uses'=>'ExcelController@exportargrupos']);

//Route::get('informe-grupos','FormulariosController@informeporGrupos')->name('informe-grupos')->middleware('auth');

Route::resource('respuestas', 'RespuestasController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
