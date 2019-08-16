<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Question;
use App\Level;
use App\User;

class QuestionController extends Controller
{
  public function index($id){
    $this->authorize('acceso', User::class);
    $serie=Serie::find($id);
    //$questions=$serie->questions($id);
    return view('series/listadoPreguntas')->with('serie',$serie);
  }

  public function create($id){
    $this->authorize('acceso', User::class);
    $serie=Serie::find($id);
    $levels=Level::all();
    return view('series/nuevaPregunta')->with('serie',$serie)->with('levels',$levels);
  }
  public function store(Request $request){
    $this->authorize('acceso', User::class);

    dd($request->input('checkPregunta'));
    $nuevaPregunta=new Question();
       if($request->input('checkPregunta')){
         dd($request->file("filePregutna"));
       //se activo pregunta con imagen
       //se generan las validaciones
       $reglas=['pregunta'=>'required',
       'filePregunta'=>'required|image|mimes:jpg,png'];
       $mensajes=['pregunta.required'=>'Debe ingresar una pregunta',
       'filePregunta.required'=>'Debe ingresar un archivo de imagen',
        'file'=>'Debe ingresar un archivo de imagen',
        'mimes'=>'El tipo de archivo debe ser jpg o png'];
       $this->validate($request,$reglas,$mensajes);
       $this->validate($request,$reglas,$mensajes);

    //dd($request->file("filePregutna"));
       $ruta=$request->file("filePregunta")->store("public/img/img_questions");
       $avatar=basename($ruta);
       $nuevaPregunta->image=$avatar;

     }else{
       $this->validate($request,
       ['pregunta'=>'required'],
       ['required'=>'Debe ingresar una pregunta']);
        }

      $nuevaPregunta->name=$request['pregunta'];
      $nuevaPregunta->level_id=$request['selectNivel'];
      $nuevaPregunta->serie_id=$request['serie_id'];
      $nuevaPregunta->save();
      return redirect('/nuevaRespuesta');
    }

    public function showDelete($id){
      $this->authorize('acceso', User::class);
      $question=Question::find($id);
      return view('series/eliminarPregunta')->with('question',$question);

    }

    public function delete(Request $request){
      $this->authorize('acceso', User::class);
      if($request->Cancelar=='no'){
        return redirect('/administrador');
      }else {
      //aca se eliminara respuestas, preguntas y serie
      $id=$request->input("id");
      $question=Question::find($id);
      foreach ($question->answer as $answer) {

          $answer->delete();
        }
      $question->delete();

      return redirect('/administrador');
      }

    }

}
