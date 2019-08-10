<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrequentQuestion;

class FaqController extends Controller
{
  public function index(){
    $preguntasFrecuentes =  FrequentQuestion::all();
    return view('preguntasfrecuentes.preguntasfrecuentes')->with('preguntasFrecuentes', $preguntasFrecuentes);
  }

}
