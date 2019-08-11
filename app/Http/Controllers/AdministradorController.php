<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdministradorController extends Controller {
    public function mostrar() {
      // $user = User::find(Auth::User()->id);
      // $this->authorize('mostrar', $user);
      return view('administrador');
  }
}
