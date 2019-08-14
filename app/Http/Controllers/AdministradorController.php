<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdministradorController extends Controller {
    public function mostrar() {
      $this->authorize('acceso', User::class);

      return view('administrador');
  }
}
