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
    return view('index');
});


Route::get('/index', function () {
    return view('index');
});


Route::get('/administrador', 'AdministradorController@mostrar');

Route::get('/preguntasfrecuentes', 'FaqController@index');

Route::get('/perfil', "UserController@show");

// Route::get('/juego/{id}', 'JuegoController@showSerie');

Route::get('/administradorpreguntasfrecuentes', 'FaqController@showFaq');

Route::post('/administradorpreguntasfrecuentes', 'FaqController@createFaq');

Route::get('/editarpreguntafrecuente/update/{id}', 'FaqController@editFaq');

Route::patch('/editarpreguntafrecuente/update/{id}', 'FaqController@updateFaq');

Route::get('/eliminarpreguntafrecuente/{id}', 'FaqController@indexFaq');

Route::get('/borrarFaq/{id}', 'FaqController@destroyFaq');

//no estoy segura de si perfil solo sería por post o no

Route::post('/perfil', "UserController@update");

Route::get('/juego', function () {
    return view('juego');
});



Route::get('/accesos', 'UserController@accessIndex');
Route::post('/accesos', 'UserController@updateAccess');

Route::get('/listadoSeries','SerieController@index');
Route::get('/listadoPreguntas/{id}','QuestionController@index');
Route::get('/listadoRespuestas/{id}','AnswerController@index');
Route::get('/nuevaSerie','SerieController@create');
Route::post('/nuevaSerie','SerieController@store');
//Route::get('/nuevaPregunta','QuestionController@create');
Route::get('/nuevaPregunta/{id}','QuestionController@create');
Route::post('/nuevaPregunta','QuestionController@store');
Route::get('/nuevaRespuesta','AnswerController@create');
Route::post('/nuevaRespuesta','AnswerController@store');
Route::get('/eliminarSerie/{id}','SerieController@showDelete');
Route::post('/eliminarSerie','SerieController@delete');
Route::get('/eliminarPregunta/{id}','QuestionController@showDelete');
Route::post('/eliminarPregunta','QuestionController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
