<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class PerfilController extends Controller
{
  public $titulo = "Mi perfil";

    function mostrar() {

        return view('perfil');
}
}
