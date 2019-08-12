<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class AnswerController extends Controller
{
  public function create(){
    $question=Question::all()->last();

    return view('series/nuevaRespuesta')->with('question',$question);
  }

  public function store(Request $request){

      return redirect('series/listadoSeries');
    }

}
