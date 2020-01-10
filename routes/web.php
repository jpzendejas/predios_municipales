<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Specialty
Route::get('/specialties','SpecialtyController@index');
Route::get('/specialties/create','SpecialtyController@create');//form registro
Route::get('/specialties/{specialty}/edit','SpecialtyController@edit');
Route::post('/specialties','SpecialtyController@store');//envio del form
Route::get('/nuevo_predio','PropiertiesController@index');
Route::post('/descripcion_propiedades','PropiertiesController@get_propierty_description');
Route::post('/tipo_usos','PropiertiesController@get_use_types');
Route::post('/adquisicion_formas','PropiertiesController@get_adquisition_shapes');
Route::post('/soporte_documentos','PropiertiesController@get_support_documents');
Route::post('/guardar_propiedad','PropiertiesController@save_propierties');
Route::post('/obtener_propiedades','PropiertiesController@get_propierties');
Route::post('/propietarios','PropiertiesController@get_owners');
Route::post('/actualizar_propiedad/{id}','PropiertiesController@update_propierties');
Route::get('/obterner_predio/{id}','PropiertiesController@get_propierty');
Route::get('/obtener_imagenes/{id}','PropiertiesController@get_images');
Route::get('/obtener_documentos/{id}','PropiertiesController@get_documents');
Route::get('/consulta_predios','PropiertiesController@check_propierties');
Route::get('/predio/{id}','PropiertiesController@view_propierty');
Route::get('/formas_adquisicion','AdquisitionShapesController@index');
Route::post('/obtener_formas_adquisicion','AdquisitionShapesController@get_adquisition_shapes');
Route::post('/save_adquisition_shape','AdquisitionShapesController@save_adquisition_shapes');
Route::post('/update_adquisition_shape/{id}','AdquisitionShapesController@update_adquisition_shapes');
Route::get('/propietarios','OwnersController@index');
Route::post('/obtener_propietarios','OwnersController@get_owners');
Route::post('/save_owner','OwnersController@save_owners');
Route::post('/update_owner/{id}','OwnersController@update_owners');
Route::get('/descripcion_predios','PropiertyDescrptionsController@index');
Route::post('/obtener_descripcion_predios','PropiertyDescrptionsController@get_propierty_descriptions');
Route::post('/save_propierty_description','PropiertyDescrptionsController@save_propierty_descriptions');
Route::post('/update_propierty_description/{id}','PropiertyDescrptionsController@update_propierty_descriptions');
