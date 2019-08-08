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

Route::get('/preguntasFrecuentes', function () {
    return view('preguntasFrecuentes');
});

//comento las rutas de registro y login porque no sé si iremos a necesitarlas

// Route::get('/registro', function () {
//     return view('registro');
// });
//
// Route::post('/registro', function () {
//     return view('registro');
// });

Route::get('/login', function () {
    return view('login');
});
//
// Route::post('/login', function () {
//     return view('login');
// });

Route::get('/perfil{id}', function ($id) {
    $vac = compact("id");
    return view('perfil', $vac);
});

//no estoy segura de si perfil solo sería por post o no

Route::post('/perfil{id}', function ($id) {
    $vac = compact("id");
    return view('perfil', $vac);
});

Route::get('/juego', function () {
    return view('juego');
});

Route::get('/administrador', function () {
    return view('administrador');
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

Route::get('/administradorpreguntasfrecuentes', function () {
    return view('administradorpreguntasfrecuentes');
});

Route::get('/editarPreguntaFrecuente{id}', function ($id) {
    $vac = compact("id");
    return view('editarPreguntaFrecuente'. $vac);
});

Route::post('/editarPreguntaFrecuente{id}', function ($id) {
    $vac = compact("id");
    return view('editarPreguntaFrecuente'. $vac);
});

Route::get('/eliminarPreguntaFrecuente{id}', function ($id) {
    $vac = compact("id");
    return view('eliminarPreguntaFrecuente', $vac);
});

Route::post('/eliminarPreguntaFrecuente{id}', function () {
  $vac = compact("id");
    return view('eliminarPreguntaFrecuente', $vac);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
