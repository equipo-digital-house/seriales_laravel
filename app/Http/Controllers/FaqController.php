<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
  public function index(){
    $preguntaFrecuente =  PreguntaFrecuente::all();
    return view('preguntasfrecuentes.preguntasfrecuentes')->with('preguntasFrecuentes', $preguntasFrecuentes);
  }
}
