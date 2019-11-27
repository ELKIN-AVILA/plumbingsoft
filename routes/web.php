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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/Empresa','EmpresaController@index');
	Route::post('/Empresa/guardar','EmpresaController@guardar');
	Route::post('/Empresa/editar','EmpresaController@editar');
	Route::post('/Empresa/actualizar','EmpresaController@actualizar');
	Route::post('/Empresa/eliminar','EmpresaController@eliminar');
	/**Infoempresa */
	Route::get('/Infoempresa','InfoempresaController@index');
	Route::post('/Infoempresa/guardar','InfoempresaController@guardar');
	Route::post('/Infoempresa/editar','InfoempresaController@editar');
	Route::post('/Infoempresa/actualizar','InfoempresaController@actualizar');
	Route::post('/Infoempresa/eliminar','InfoempresaController@eliminar');
	/**Tipherra */
	Route::get('/Tipherra','TipherraController@index');
	Route::post('/Tipherra/guardar','TipherraController@guardar');
	Route::post('/Tipherra/editar','TipherraController@editar');
	Route::post('/Tipherra/actualizar','TipherraController@actualizar');
	Route::post('/Tipherra/eliminar','TipherraController@eliminar');
	/**Herramientas */
	Route::get('/Herramientas','HerramientasController@index');
	Route::post('/Herramientas/guardar','HerramientasController@guardar');
	Route::post('/Herramientas/editar','HerramientasController@editar');
	Route::post('/Herramientas/actualizar','HerramientasController@actualizar');
	Route::post('/Herramientas/eliminar','HerramientasController@eliminar');
	/**Empresa contratante */
	Route::get('/Empresactr','EmpresactrController@index');
	Route::post('/Empresactr/guardar','EmpresactrController@guardar');
	Route::post('/Empresactr/editar','EmpresactrController@editar');
	Route::post('/Empresactr/actualizar','EmpresactrController@actualizar');
	Route::post('/Empresactr/eliminar','EmpresactrController@eliminar');
	/**Obras */
	Route::get('/Obras','ObrasController@index');
	Route::post('/Obras/guardar','ObrasController@guardar');
	Route::post('/Obras/editar','ObrasController@editar');
	Route::post('/Obras/actualizar','ObrasController@actualizar');
	Route::post('/Obras/eliminar','ObrasController@eliminar');
	/**Cargos */
	Route::get('/Cargos','CargosController@index');
	Route::post('/Cargos/guardar','CargosController@guardar');
	Route::post('/Cargos/editar','CargosController@editar');
	Route::post('/Cargos/actualizar','CargosController@actualizar');
	Route::post('/Cargos/eliminar','CargosController@eliminar');
	/*Personas */
	Route::get('/Personas','PersonasController@index');
	Route::post('/Personas/guardar','PersonasController@guardar');
	Route::post('/Personas/editar','PersonasController@editar');
	Route::put('/Personas/actualizar','PersonasController@actualizar');
	Route::delete('/Personas/eliminar','PersonasController@eliminar');
	Route::post('/Personas/getdepart','PersonasController@getdepart');
	Route::post('/Personas/getciudades','PersonasController@getciudades');
	Route::post('/Personas/guardarexamenesxper','PersonasController@guadarexamenesxper');
	Route::post('/Personas/getexamenes','PersonasController@getexamenes');
	/**Tipo examen */
	Route::get('/Tipoexa','TipoexaController@index');
	Route::post('/Tipoexa/guardar','TipoexaController@guardar');
	Route::post('/Tipoexa/editar','TipoexaController@editar');
	Route::put('/Tipoexa/actualizar','TipoexaController@actualizar');
	Route::delete('/Tipoexa/eliminar','TipoexaController@eliminar');
	/**Examenes */
	Route::get('/Examenes','ExamenesController@index');
	Route::post('/Examenes/guardar','ExamenesController@guardar');
	Route::post('/Examenes/editar','ExamenesController@editar');
	Route::put('/Examenes/actualizar','ExamenesController@actualizar');
	Route::delete('/Examenes/eliminar','ExamenesController@eliminar');

	/**Etapas */
	Route::get('/Etapas','EtapasController@index');
	Route::post('/Etapas/guardar','EtapasController@guardar');
	Route::post('/Etapas/editar','EtapasController@editar');
	Route::put('/Etapas/actualizar','EtapasController@actualizar');
	Route::delete('/Etapas/eliminar','EtapasController@eliminar');
	/**Secciones */
	Route::get('/Secciones','SeccionesController@index');
	Route::post('/Secciones/guardar','SeccionesController@guardar');
	Route::post('/Secciones/editar','SeccionesController@editar');
	Route::put('/Secciones/actualizar','SeccionesController@actualizar');
	Route::delete('/Secciones/eliminar','SeccionesController@eliminar');
	/**Tipo de edificacion */
	Route::get('/Tipedificacion','TipedificacionController@index');
	Route::post('/Tipedificacion/guardar','TipedificacionController@guardar');
	Route::post('/Tipedificacion/editar','TipedificacionController@editar');
	Route::put('/Tipedificacion/actualizar','TipedificacionController@actualizar');
	Route::delete('/Tipedificacion/eliminar','TipedificacionController@eliminar');
	/** Casas*/
	Route::get('/Casas','CasasController@index');
	Route::post('/Casas/guardar','CasasController@guardar');
	Route::post('/Casas/editar','CasasController@editar');
	Route::put('/Casas/actualizar','CasasController@actualizar');
	Route::delete('/Casas/eliminar','CasasController@eliminar');
	Route::post('/Casas/traeetapas','CasasController@traeetapas');
	Route::post('/Casas/traesecciones','CasasController@traesecciones');
	Route::post('/Casas/traecasas','CasasController@traecasas');
	/**Tipdificultad */
	Route::get('/Tipdificultad','TipdificultadController@index');
	Route::post('/Tipdificultad/guardar','TipdificultadController@guardar');
	Route::post('/Tipdificultad/editar','TipdificultadController@editar');
	Route::put('/Tipdificultad/actualizar','TipdificultadController@actualizar');
	Route::delete('/Tipdificultad/eliminar','TipdificultadController@eliminar');
	/**Tareas */
	Route::get('/Tareas','TareasController@index');
	Route::post('/Tareas/guardar','TareasController@guardar');
	Route::post('/Tareas/editar','TareasController@editar');
	Route::put('/Tareas/actualizar','TareasController@actualizar');
	Route::delete('/Tareas/eliminar','TareasController@eliminar');
	/**Cronograma  */
	Route::get('/Cronograma','CronogramaController@index');
	Route::post('/Cronograma/guardar','CronogramaController@guardar');
	Route::post('/Cronograma/editar','CronogramaController@editar');
	Route::put('/Cronograma/actualizar','CronogramaController@actualizar');
	Route::delete('/Cronograma/eliminar','CronogramaController@eliminar');
	
	
});
