<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Question;
use App\Answer;
use Auth;

class JuegoController extends Controller
{
  // public function showSerie($id){
  //   $serie = Serie::find("id");
  //   return view('juego')->with('serie', $serie);
  // }

  public function showSeries() {
    $series = Serie::all();
    $usuario = Auth::user();
    if($usuario == null) {
      return redirect('login');
    }
    return view('juego')->with('usuario', $usuario)->with('series',$series);
  }

  public function game(Request $req) {

    // dd($req);
    // $series = $req['series'];
    // $usuario = Auth::user();

    return redirect('juego');

   // return redirect("juego")->with('usuario', $usuario)->with('seriesElegidas',$series)->with('modal',$modal);
 }
}
