<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Question;
use App\Level;
use App\User;
use App\Answer;

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
        return redirect('/listadoSeries');
      }else {
      //aca se eliminara respuestas, preguntas y serie
      $id=$request->input("id");
      $question=Question::find($id);
      foreach ($question->answer as $answer) {

          $answer->delete();
        }
      $question->delete();

      return redirect('/listadoSeries');
      }

    }
    public function showUpdate($id){
    $this->authorize('acceso', User::class);
    $question=Question::find($id);
    $level=Level::all();
    return view('series/modificarPregunta')->with('question',$question)->with('levels',$level);

    }
    public function update(Request $request){
    //dd($request);
      $this->authorize('acceso', User::class);
    $new_name=null;


         //se activo pregunta con imagen
         //se generan las validaciones

         $this->validate($request,[
                'select_file'=>'
                image|mimes:jpeg,png,jpg,gif|max:1024',
                'pregunta'=>'
                required|string',
                'fileRespuesta1'=>'
                     image|mimes:jpeg,png,jpg,gif|max:1024',
                 'fileRespuesta2'=>'
                     image|mimes:jpeg,png,jpg,gif|max:1024',
                 'fileRespuesta3'=>'
                    image|mimes:jpeg,png,jpg,gif|max:1024',
                 'fileRespuesta4'=>'
                     image|mimes:jpeg,png,jpg,gif|max:1024',
                 'respuesta1'=>'
                     string',
                 'respuesta2'=>'
                    string',
                 'respuesta3'=>'
                    string',
                'respuesta4'=>'
                    string'
              ],
              [
                'image'=>'Archivo debe ser una imagen',
                'mimes'=>'Archivo de imagen debe ser jpeg, png, jpg o gif',
                'max'=>'Archivo debe pesar maximo 1MB',
                'respuesta1.required'=>'Falta ingresar la Respuesta 1',
                'respuesta2.required'=>'Falta ingresar la Respuesta 2',
                'respuesta3.required'=>'Falta ingresar la Respuesta 3',
                'respuesta4.required'=>'Falta ingresar la Respuesta 4',
                'string'=>'La respuesta debe estar formada por letras',
                'pregunta.required'=>'Debe ingresar una pregunta',
                'pregunta.string'=>'La pregunta debe estar formada por letras'
              ]);

        $respuestaCorrecta1=0;
        $respuestaCorrecta2=0;
        $respuestaCorrecta3=0;
        $respuestaCorrecta4=0;


        switch ($request->selectRespuestaCorrecta) {
          case '1':
            $respuestaCorrecta1=1;
            break;
            case '2':
            $respuestaCorrecta2=2;
            break;
            case '3':
            $respuestaCorrecta3=3;
            break;
            case '4':
            $respuestaCorrecta4=4;
            break;
          }
$nuevaPregunta=Question::find($request['question_id']);
$respuesta1=Answer::find($request['answer1']);
$respuesta2=Answer::find($request['answer2']);
$respuesta3=Answer::find($request['answer3']);
$respuesta4=Answer::find($request['answer4']);

if(isset($request['select_file'])){
$imagePregunta=$request->file('select_file')->store("/public/img/img_questions");
$new_name=basename($imagePregunta);
$nuevaPregunta->image=$new_name;
}else{
$nuevaPregunta->image=$request['imagenPregunta'];
}
if(isset($request['fileRespueta1'])){
  $image1=$request->file('fileRespuesta1')->store("/public/img/img_answers");
  $new_name1=basename($image1);
  $respuesta1->image=$new_name1;
}else{
  $respuesta1->image=$request['imagenAnswer1'];
}
if(isset($request['fileRespueta2'])){
  $image2=$request->file('fileRespuesta2')->store("/public/img/img_answers");
  $new_name2=basename($image2);
  $respuesta2->image=$new_name2;
}else{
  $respuesta2->image=$request['imagenAnswer2'];
}
if(isset($request['fileRespueta3'])){
  $image3=$request->file('fileRespuesta3')->store("/public/img/img_answers");
  $new_name3=basename($image3);
  $respuesta3->image=$new_name3;
}else{
  $respuesta3->image=$request['imagenAnswer3'];
}
if(isset($request['fileRespueta4'])){
  $image3=$request->file('fileRespuesta3')->store("/public/img/img_answers");
  $new_name4=basename($image4);
  $respuesta4->image=$new_name4;
}else{
  $respuesta4->image=$request['imagenAnswer4'];
}

            $nuevaPregunta->name=$request['pregunta'];
            $nuevaPregunta->level_id=$request['selectNivel'];
            $nuevaPregunta->serie_id=$request['serie_id'];
            $nuevaPregunta->save();

              $respuesta1->name=$request['respuesta1'];
              $respuesta1->correctAnswer=$respuestaCorrecta1;
              $respuesta1->question_id=$request['question_id'];
              $respuesta1->save();

              $respuesta2->name=$request['respuesta2'];
              $respuesta2->correctAnswer=$respuestaCorrecta2;
              $respuesta2->question_id=$request['question_id'];
              $respuesta2->save();


              $respuesta3->name=$request['respuesta3'];
              $respuesta3->correctAnswer=$respuestaCorrecta3;
              $respuesta3->question_id=$request['question_id'];
              $respuesta3->save();

              $respuesta4->name=$request['respuesta4'];
              $respuesta4->correctAnswer=$respuestaCorrecta4;
              $respuesta4->question_id=$request['question_id'];
              $respuesta4->save();


          return view('administrador');
        }

}
