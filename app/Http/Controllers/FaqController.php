<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrequentQuestion;

class FaqController extends Controller
{
  public function index(){
    $preguntasFrecuentes = FrequentQuestion::all();
    return view('preguntasfrecuentes')->with('preguntasFrecuentes', $preguntasFrecuentes);
  }

  public function showFaq(){
    $preguntasFrecuentes = FrequentQuestion::all();
    return view('preguntasfrecuentes.administradorpreguntasfrecuentes')->with('preguntasFrecuentes', $preguntasFrecuentes);
}

  public function createFaq(Request $request){

    $reglas = [
      'name' => 'required',
      'answer' => 'required'
    ];

    $mensajes = [
      'required' => 'Por favor, complete el campo :attribute',
    ];

    $this->validate($request, $reglas, $mensajes);

    $nuevaFaq = new FrequentQuestion($request->all());
    $nuevaFaq->save();
    return redirect('administradorpreguntasfrecuentes');

  }

  public function editFac($id){
    $preguntaFrecuente = FrequentQuestion::find($id);
    return view('preguntasfrecuentes.editarpreguntafrecuente')->with('preguntaFrecuente', $preguntaFrecuente);

  }
}
