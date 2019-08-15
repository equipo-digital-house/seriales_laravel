<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Question;
use App\Level;

class QuestionController extends Controller
{
  public function index($id){
//dd($id);
    $serie=Serie::find($id);
    //$questions=$serie->questions($id);
    return view('series/listadoPreguntas')->with('serie',$serie);
  }

  public function create($id){
    $serie=Serie::find($id);
    $levels=Level::all();
    return view('series/nuevaPregunta')->with('serie',$serie)->with('levels',$levels);
  }
  public function store(Request $request){
    //dd($request->file("filePregunta"));
    dd($request);
    dd($request->input('checkPregunta'));
    $nuevaPregunta=new Question();
       if($request->input('checkPregunta')){
         dd($request->file("filePregutna"));
       //se activo pregunta con imagen
       //se generan las validaciones
       $this->validate($request,
       ['pregunta'=>'required',
       'filePregunta'=>'required|image|mimes:jpg,png'],
       ['pregunta.required'=>'Debe ingresar una pregunta',
       $reglas=['pregunta'=>'required',
       'filePregunta'=>'required|image|mimes:jpg,png'];
       $mensajes=['pregunta.required'=>'Debe ingresar una pregunta',
       'filePregunta.required'=>'Debe ingresar un archivo de imagen',
        'file'=>'Debe ingresar un archivo de imagen',
        'mimes'=>'El tipo de archivo debe ser jpg o png']);
        'mimes'=>'El tipo de archivo debe ser jpg o png'];


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

}
