<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrequentQuestion;
use App\User;

class FaqController extends Controller
{
  public function index() {
    $preguntasFrecuentes = FrequentQuestion::all();
    return view('preguntasfrecuentes')->with('preguntasFrecuentes', $preguntasFrecuentes);
  }

  public function showFaq() {
    $this->authorize('acceso', User::class);

    $preguntasFrecuentes = FrequentQuestion::all();
    return view('preguntasfrecuentes.administradorpreguntasfrecuentes')->with('preguntasFrecuentes', $preguntasFrecuentes);
}

  public function createFaq(Request $request){
    $this->authorize('acceso', User::class);

    $reglas = [
      'name' => 'required',
      'answer' => 'required'
    ];

    $mensajes = [
      'required' => 'Por favor, complete el campo :attribute'
    ];

    $this->validate($request, $reglas, $mensajes);

    $preguntaFrecuente = new FrequentQuestion($request->all());
    $preguntaFrecuente->save();
    return redirect('administradorpreguntasfrecuentes');

  }

  public function editFaq($id){
    $this->authorize('acceso', User::class);

    $preguntaFrecuente = FrequentQuestion::find($id);
    return view('preguntasfrecuentes.editarpreguntafrecuente')->with('preguntaFrecuente', $preguntaFrecuente);
  }

  public function updateFaq(Request $request, $id){

    $reglas = [
      'name' => 'required',
      'answer' => 'required'
    ];

    $mensajes = [
      'required' => 'Por favor, complete el campo :attribute'
    ];

    $this->validate($request, $reglas, $mensajes);
    $preguntaFrecuente = FrequentQuestion::find($id);

    $preguntaFrecuente->name = $request->input('name') !== $preguntaFrecuente->name ? $request->input('name') : $preguntaFrecuente->name;

    $preguntaFrecuente->answer = $request->input('answer') !== $preguntaFrecuente->answer ? $request->input('answer') : $preguntaFrecuente->answer;

    $preguntaFrecuente->save();

    return redirect('administradorpreguntasfrecuentes');
  }

  public function indexFaq($id){
    $this->authorize('acceso', User::class);

  $preguntaFrecuente = FrequentQuestion::find($id);
  return view('preguntasfrecuentes.eliminarpreguntafrecuente')->with('preguntaFrecuente', $preguntaFrecuente);
}

  public function destroyFaq($id){
    $borrarFaq = FrequentQuestion::find($id);
    $borrarFaq->delete();
    return redirect('administradorpreguntasfrecuentes');
  }
}
