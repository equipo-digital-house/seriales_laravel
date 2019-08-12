<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Question;
use App\Answer;

class JuegoController extends Controller
{
  public function showSerie($id){
    $serie = Serie::find("id");
    return view('juego')->with('serie', $serie);
  }
}
