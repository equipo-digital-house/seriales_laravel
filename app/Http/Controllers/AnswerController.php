<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Answer;

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
    //dd($request);
    $new_name1=null;
    $new_name2=null;
    $new_name3=null;
    $new_name4=null;
    $respuestaCorrecta1=0;
    $respuestaCorrecta2=0;
    $respuestaCorrecta3=0;
    $respuestaCorrecta4=0;
    $respuesta1=new Answer();
    $respuesta2=new Answer();
    $respuesta3=new Answer();
    $respuesta4=new Answer();

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
    if($request->checkRespuesta=="conImagen"){
      $this->validate($request,[
             'fileRespuesta1'=>'
                  required|image|mimes:jpeg,png,jpg,gif|max:1024',
              'fileRespuesta2'=>'
                  required|image|mimes:jpeg,png,jpg,gif|max:1024',
              'fileRespuesta3'=>'
                  required|image|mimes:jpeg,png,jpg,gif|max:1024',
              'fileRespuesta4'=>'
                  required|image|mimes:jpeg,png,jpg,gif|max:1024',
              'respuesta1'=>'
                  required|string',
              'respuesta2'=>'
                  required|string',
              'respuesta3'=>'
                  required|string',
             'respuesta4'=>'
                  required|string'
           ],
           [
             'fileRespuesta1.required'=>'Debe ingresar imagen de respuesta 1',
             'fileRespuesta2.required'=>'Debe ingresar imagen de respuesta 2',
             'fileRespuesta3.required'=>'Debe ingresar imagen de respuesta 3',
             'fileRespuesta4.required'=>'Debe ingresar imagen de respuesta 4',
             'image'=>'Archivo debe ser una imagen',
             'mimes'=>'Archivo de imagen debe ser jpeg, png, jpg o gif',
             'max'=>'Archivo debe pesar maximo 1MB',
             'respuesta1.required'=>'Falta ingresar la Respuesta 1',
             'respuesta2.required'=>'Falta ingresar la Respuesta 2',
             'respuesta3.required'=>'Falta ingresar la Respuesta 3',
             'respuesta4.required'=>'Falta ingresar la Respuesta 4',
             'respuesta4Help.required'=>'falta ingresar una Respuesta',
             'string'=>'La respuesta debe estar formada por letras'
           ]);

          $image1=$request->file('fileRespuesta1')->store("/public/img/img_answers");
          $image2=$request->file('fileRespuesta2')->store("/public/img/img_answers");
          $image3=$request->file('fileRespuesta3')->store("/public/img/img_answers");
          $image4=$request->file('fileRespuesta4')->store("/public/img/img_answers");
          //$new_name=rand().'.'.$image->getClientOriginalExtension();
          //$image->storage("/public/img/img_questions");
          $new_name1=basename($image1);
          $new_name2=basename($image2);
          $new_name3=basename($image3);
          $new_name4=basename($image4);
        }else{
          $this->validate($request,[
            'respuesta1'=>'required|string',
            'respuesta2'=>'required|string',
            'respuesta3'=>'required|string',
            'respuesta4'=>'required|string'],
          [
            'respuesta1.required'=>'Falta ingresar la respuesta 1',
            'respuesta2.required'=>'Falta ingresar la respuesta 2',
            'respuesta3.required'=>'Falta ingresar la respuesta 3',
            'respuesta4.required'=>'Falta ingresar la respuesta 4',
            'string'=>'La respuesta debe estar formada por letras'
          ]);
        }

          $respuesta1->image=$new_name1;
          $respuesta1->name=$request['respuesta1'];
          $respuesta1->correctAnswer=$respuestaCorrecta1;
          $respuesta1->question_id=$request['question_id'];
          $respuesta1->save();
          $respuesta2->image=$new_name2;
          $respuesta2->name=$request['respuesta2'];
          $respuesta2->correctAnswer=$respuestaCorrecta2;
          $respuesta2->question_id=$request['question_id'];
          $respuesta2->save();
          $respuesta3->image=$new_name3;
          $respuesta3->name=$request['respuesta3'];
          $respuesta3->correctAnswer=$respuestaCorrecta3;
          $respuesta3->question_id=$request['question_id'];
          $respuesta3->save();
          $respuesta4->image=$new_name4;
          $respuesta4->name=$request['respuesta4'];
          $respuesta4->correctAnswer=$respuestaCorrecta4;
          $respuesta4->question_id=$request['question_id'];
          $respuesta4->save();


      return view('administrador');
    }

}
