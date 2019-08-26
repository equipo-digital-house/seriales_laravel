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
  //  dd($request->checkPregunta);
    $this->authorize('acceso', User::class);
  $new_name=null;
  $nuevaPregunta=new Question();

       //se activo pregunta con imagen
       //se generan las validaciones
if($request->checkPregunta=="conImagen"){
       $this->validate($request,[
         'select_file'=>'
              required|image|mimes:jpeg,png,jpg,gif|max:1024',
         'pregunta'=>'
              required|string'
       ],
       [
         'select_file.required'=>'Debe ingresar imagen',
         'image'=>'Archivo debe ser una imagen',
         'mimes'=>'Archivo de imagen debe ser jpeg, png, jpg o gif',
         'max'=>'Archivo debe pesar maximo 1MB',
         'pregunta.required'=>'Debe ingresar una pregunta',
         'pregunta.string'=>'La pregunta debe estar formada por letras'
       ]);
      $image=$request->file('select_file')->store("/public/img/img_questions");
      //$new_name=rand().'.'.$image->getClientOriginalExtension();
      //$image->storage("/public/img/img_questions");
      $new_name=basename($image);
    }else{
      $this->validate($request,[
        'pregunta'=>'required|string'],
      [
        'pregunta.required'=>'Debe ingresar una pregunta',
        'pregunta.string'=>'La pregunta debe estar formada por letras'
      ]);

    }


      $nuevaPregunta->image=$new_name;
      $nuevaPregunta->name=$request['pregunta'];
      $nuevaPregunta->level_id=$request['selectNivel'];
      $nuevaPregunta->serie_id=$request['serie_id'];
      $nuevaPregunta->save();
      $question=Question::all()->last();
      $id=$question->id;
      //return back()->with('success', 'Pregunta fue guardada correctamente')->with('path',$new_name)->with('pregunta',$nuevaPregunta);

      return redirect('/nuevaRespuesta')->with('question',$question);
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
