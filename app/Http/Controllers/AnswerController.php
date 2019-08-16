<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;

class AnswerController extends Controller
{

  public function index($id){
    $this->authorize('acceso', User::class);

    $question=Question::find($id);
    return view('series/listadoRespuestas')->with('question',$question);
  }


  public function create(){
    $this->authorize('acceso', User::class);

    $question=Question::all()->last();

    return view('series/nuevaRespuesta')->with('question',$question);
  }

  public function store(Request $request){
    $this->authorize('acceso', User::class);


      return redirect('series/listadoSeries');
    }

}
