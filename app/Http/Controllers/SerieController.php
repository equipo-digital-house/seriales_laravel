<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class SerieController extends Controller
{
    //
    public function index(){
      $series=Serie::orderBy('name','ASC')->get();
      return view('series/listadoSeries')->with('series',$series);
    }
    public function create(){
      return view('series/nuevaSerie');
    }

    public function store(Request $request){
      //dd($request);
      //$this->validate($request,
      //[
      //  'name'=>'string|required|unique:series:name',
      //  'avatar'=>'file'],
      //[
      //  'required'=>'Debe ingresar un nombre',
      //  'unique'=>'Series ya existe',
      //  'string'=>'El campo es string',
      //  'file'=>'Debe ingresar un archivo de imagen'
      //]);
        $ruta=$request->file("avatar")->store("public/img/series");
        $avatar=basename($ruta);
        $nuevaSerie=new Serie();
        $nuevaSerie->name=$request['nameSerie'];
        $nuevaSerie->image=$avatar;
        $nuevaSerie->save();
        return redirect('/listadoSeries');
    }

    public function show($id){

      $serie=Serie::find($id);
      if(!is_null($serie))
      return view('serie.mostrar',['serie'=>$serie->toArray()]);
      else {
        // code...
      }

    }

    public function showDelete($id){
      $series=Serie::all();
      if($id!=0){
      $serie=Serie::find($id);
      return view('series/eliminarSerie')->with('serie',$serie)->with('series',$series);
    }else{
      $series=Serie::all();
      return view('series/eliminarSerie')->with('series',$series);
    }
    }
    public function Delete(Request $request){
$valor=null;
      if($request->Cancelar=='no'){
        return redirect('/administrador');
      }else {
      //aca se eliminara respuestas, preguntas y serie
      $id=$request->input("id");
      $serie=Serie::find($id);
      foreach ($serie->question as $question) {

        foreach ($question->answer as $answer) {

          $answer->delete();
        }
        $question->delete();
      }
      $serie->delete();
      return redirect('/administrador');
      }

    }
}
