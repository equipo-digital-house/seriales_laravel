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

Route::patch('/editarpreguntafrecuente/{id}/update', 'FaqController@update');

//no estoy segura de si perfil solo sería por post o no

Route::post('/perfil', "UserController@update");

Route::get('/juego', function () {
    return view('juego');
});



Route::get('/acceso', function () {
    return view('acceso');
});

Route::get('/listadoSeriesAdmin', function () {
    return view('listadoSeriesAdmin');
});

Route::get('/agregarSerie', function () {
    return view('agregarSerie');
});

Route::post('/agregarSerie', function () {
    return view('agregarSerie');
});

Route::get('/agregarPreguntas', function () {
    return view('agregarPreguntas');
});

Route::post('/agregarPreguntas', function () {
    return view('agregarPreguntas');
});

Route::get('/eliminarSeriesAdmin/{id}', function ($id) {
    $vac = compact("id");
    return view('eliminarSeriesAdmin', $vac);
});

Route::post('/eliminarSeriesAdmin{id}', function ($id) {
    $vac = compact("id");
    return view('eliminarSeriesAdmin', $vac);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
