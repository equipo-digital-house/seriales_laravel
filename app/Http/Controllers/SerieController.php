<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\User;

class SerieController extends Controller
{
    //
    public function index(){
      $this->authorize('acceso', User::class);
      $series=Serie::orderBy('name','ASC')->paginate();
      return view('series/listadoSeries')->with('series',$series);
    }
    public function create(){
      $this->authorize('acceso', User::class);
      return view('series/nuevaSerie');
    }

    public function store(Request $request){
      $this->authorize('acceso', User::class);
      //dd($request);
      $this->validate($request,
      [
    'nameSerie'=>'required|unique:series,name|string',
    'avatar'=>'required|image|mimes:jpeg,png,jpg,gif|max:1024'],
    [
    'avatar.required'=>'Debe ingresar imagen',
    'image'=>'Archivo debe ser una imagen',
    'mimes'=>'Archivo de imagen debe ser jpeg, png, jpg o gif',
    'max'=>'Archivo debe pesar maximo 1MB',
    'nameSerie.required'=>'Debe ingresar una Serie',
    'unique'=>'Series ya existe',
    'string'=>'El campo debe ser string'
    ]);

        $ruta=$request->file("avatar")->store("public/img/series");
        $avatar=basename($ruta);
        $nuevaSerie=new Serie();
        $nuevaSerie->name=$request['nameSerie'];
        $nuevaSerie->image=$avatar;
        $nuevaSerie->save();
        return redirect('/listadoSeries');
    }

    public function show($id){
      $this->authorize('acceso', User::class);

      $serie=Serie::find($id);
      if(!is_null($serie))
      return view('serie.mostrar',['serie'=>$serie->toArray()]);
      else {
        // code...
      }

    }

    public function showDelete($id){
      $this->authorize('acceso', User::class);
      $series=Serie::all();
      if($id!=0){
      $serie=Serie::find($id);
      return view('series/eliminarSerie')->with('serie',$serie)->with('series',$series);
    }else{
      $series=Serie::all();
      return view('series/eliminarSerie')->with('series',$series);
    }
    }
    public function delete(Request $request){
      $this->authorize('acceso', User::class);
      $valor=null;
      if($request->Cancelar=='no'){
        return redirect('/listadoSeries');
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
      return redirect('/listadoSeries');
      }

    }
}
