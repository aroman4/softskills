<?php
/**********************************************************************/
/* Route del proyecto TEG realizado por Alvaro Roman y Felicia Jardim */
/**********************************************************************/

Route::get('/', 'FrontController@index')->name('index');
Route::get('/asesorias', 'FrontController@asesorias')->name('asesorias');
Route::get('/solicitud/{id}', 'SolicitudController@mostrar');
Route::get('/investigacion', 'FrontController@investigacion')->name('investigacion');
Route::get('/solicitud', 'RequestController@solicitud');

//publicacion
Route::get('/publicacioninve', 'PublicacionController@index')->name('publicacioninve');

//route de usuario
route::group(['prefix' => 'admin'], function(){
    Route::resource('usuarios','UsersController');
    Route::get('/usuarios/borrar/{id}','UsersController@borrar')->name('usuarios.borrar');
    Route::get('/export','UsersController@export')->name('usuarios.export');
});

//route de solicitud
Route::group(['prefix' => 'solic'], function(){
    Route::resource('solicitud','RequestController');
    //Eliminar
    Route::get('solicitud/{id}/destroy',[
        'uses' => 'RequestController@destroy',
        'as' => 'solicitud.destroy'
    ]);
    Route::get('solicinvestigacion', 'RequestController@SolicInvestigacion')->name('solicinvestigacion');
    Route::get('solicasesoria', 'RequestController@SolicAsesoria')->name('solicasesoria');
    Route::get('x', 'RequestController@prueba'); 
});

Route::resource('moduloinvestigacion','InvestigacionController');

//Editar solicitud
Route::get( '/editarinves/{id}' , 'RequestController@editarInvestigacion')->name('editarinves');

//otro eliminar 
Route::resource('moduloinv','InvestigacionController');
Route::get('moduloinv/{id}/destroy',[
    'uses' => 'InvestigacionController@destroy',
    'as' => 'moduloinv.destroy'
]);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//ruta escritorios
Route::get('/escritoriocliente', function () {
    return view('asesoria.escritoriocliente');
})->name('escritoriocliente');
Route::get('/escritorioasesor', function () {
    return view('asesoria.escritorioasesor');
})->name('escritorioasesor');
Route::get('/escritorioinvestigador', function () {
    return view('investigaciones.escritorioinvestigador');
})->name('escritorioinvestigador');
Route::get('/escritoriocomite', function () {
    return view('investigaciones.escritoriocomite');
})->name('escritoriocomite');
Route::get('/administracion', function () {
    return view('admin.administracion');
})->name('administracion');

//ruta aceptar asesoria
Route::get('/aceptarasesoria/{id}','AsesoriaController@AceptarAsesoria', function($id){
    return redirect()->action(
        'AsesoriaController@AceptarAsesoria', ['id' => $id]
    );
});

Route::resource('moduloasesoria','AsesoriaController');
Route::resource('moduloinvestigaciones','InvestigacionController');

//-------------postulacion

//route de postulacion
Route::group(['prefix' => 'postulacion'], function(){
    Route::resource('postulacion','PostulacionController');
    //Eliminar
    Route::get('postulacion/{id}/destroy',[
        'uses' => 'PostulacionController@destroy',
        'as' => 'postulacion.destroy'
    ]);
    Route::get('solicpostulacion/{idinv}', 'PostulacionController@SolicPostulacion')->name('solicpostulacion');
});
//---------vista de las postulaciones
Route::get('/postulaciones', function () {
    return view('postulacion.postulaciones');
})->name('postulaciones');
//--vista de lista de postulaciones
Route::get('/listapostulaciones', function () {//postulacion
    return view('postulacion.listapostulaciones');
})->name('listapostulaciones');
//ver postulacion
Route::resource('verPostulacion','PostulacionController');

//ruta aceptar postulacion
Route::get('/aceptarpostulacion/{id}','PostulacionController@AceptarPostulacion', function($id){
    return redirect()->action(
        'PostulacionController@AceptarPostulacion', ['id' => $id]
    );
});
//rechachar postulacion
Route::get('/rechazarpostulacion/{id}','PostulacionController@RechazarPostulacion', function($id){
    return redirect()->action(
        'PostulacionController@RechazarPostulacion', ['id' => $id]
    );
});
//Eliminar postulacion rechazada
Route::resource('modulopost','PostulacionController');
Route::get('modulopost/{id}/destroy',[
    'uses' => 'PostulacionController@destroy',
    'as' => 'modulopost.destroy'
]);
//showsPost
Route::get('/listapostulaciones/{id}','PostulacionController@showPost', function($id){
    return redirect()->action(
        'PostulacionController@showPost', ['id' => $id]
    );
});
Route::resource('modulopostulacion','PostulacionController');
//boton de ver investigacion
Route::get( '/modpost/{id}' , 'PostulacionController@invtg')->name('modpost');//estaaa

//-----------------------------------------------------------

//cuestionario
Route::get('/cuestionario', 'CuestionarioController@home')->name('cuestionario.home');
 
Route::get('/cuestionario/new', 'CuestionarioController@nuevoCuest')->name('cuestionario.nuevo');
Route::get('/cuestionario/{cuestionario}', 'CuestionarioController@detalle')->name('cuestionario.detalle');
Route::get('/cuestionario/ver/{cuestionario}', 'CuestionarioController@ver_cuestionario')->name('cuestionario.ver');
Route::get('/cuestionario/respuesta/{cuestionario}', 'CuestionarioController@ver_respuestas_cuestionario')->name('cuestionario.respuestas');
Route::get('/cuestionario/{cuestionario}/borrar', 'CuestionarioController@delete_cuestionario')->name('cuestionario.delete');
 
Route::get('/cuestionario/{cuestionario}/editar', 'CuestionarioController@edit')->name('cuestionario.editar');
Route::patch('/cuestionario/{cuestionario}/update', 'CuestionarioController@update')->name('cuestionario.update');
 
Route::post('/cuestionario/ver/{cuestionario}/completado', 'RespuestaController@store')->name('cuestionario.completado');
Route::post('/cuestionario/crear', 'CuestionarioController@crear')->name('cuestionario.crear');
 
// preguntas
Route::post('/cuestionario/{cuestionario}/preguntas', 'PreguntaController@store')->name('pregunta.guardar');
 
Route::get('/pregunta/{pregunta}/editar', 'preguntaController@edit')->name('pregunta.editar');
Route::patch('/pregunta/{pregunta}/update', 'preguntaController@update')->name('pregunta.update');

//admin
//ruta aceptar investigacion
Route::get('/aceptarinvestigacion/{id}','InvestigacionController@AceptarInvestigacion', function($id){
    return redirect()->action(
        'InvestigacionController@AceptarInvestigacion', ['id' => $id]
    );
});

//ruta de prueba BORRAR LUEGO
Route::get('/prueba', 'FrontController@prueba');
Route::get('/aprender', 'FrontController@aprender');
Route::get('/pruebablade', 'FrontController@Pruebablade');
Route::get('/prueba', 'FrontController@prueba');
Route::get('/header', 'FrontController@header');
Route::get('/footer', 'FrontController@footer');
