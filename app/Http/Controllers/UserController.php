<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

  public function __construct() {
      // $this->middleware('auth');
    }

  public function show() {
    $titulo = "Mi perfil";
    $usuarioLog = Auth::user();
    if($usuarioLog == null) {
      return redirect('login');
    }

    return view('perfil')->with('usuarioLog', $usuarioLog);
  }

  public function update(Request $req) {

      $datoModificado= $req['seleccion'];
      $usuarioLog = Auth::user();

      //VALIDACION
      switch ($datoModificado) {
        case '1':
        $reglas = [
          "name" => 'required | string | max:255',
          "email" => 'required | string | email | max:255'
        ];
          break;

        case '2':
          $reglas = [
            "avatar" => 'file'
          ];
          break;

        case '3':
          $reglas = [
            "password" => 'required| string| min:8| confirmed'
          ];
      }

      $mensajes = [
        "string" => "El campo :attribute debe ser un texto",
        "max" => "El campo :attribute debe contener un máximo de :max caracteres",
        "email"=> "El campo :attribute debe ser un email",
        "unique" => "El campo :attribute se encuentra repetido",
        "min" => "El campo :attribute debe contener un mínimo de :min caracteres",
        "required" => "El campo :attribute es requerido.",
        "confirmed" => "Las contaseñas no coinciden."
      ];

      $this->validate($req, $reglas, $mensajes);

    //MODIFICAR DATOS
     switch($datoModificado) {
       case 1 :
       $usuarioLog->name = $req['name'];
       $usuarioLog->email = $req['email'];
       break;

       case 2 :
       $ruta = $req->file("avatar")->store('public/avatars');
       $nombreArchivo = basename($ruta);
       $usuarioLog->avatar = $nombreArchivo;
       break;

       case 3 :
       $usuarioLog->password = Hash::make($req['password']);
       break;
     }

     $usuarioLog->save();

     return redirect("perfil");
  }

  public function accessIndex() {
    $titulo = "Editar Permisos";
    return view ('accesos')->with('titulo', $titulo);
  }

  public function updateAccess(Request $req) {

//VALIDAR FORMULARIO
    $reglas = [
      "email" => 'required | string | email | max:255',
      "role" => 'required'
    ];

    $mensajes = [
      "email" => "El campo :attribute debe ser un email.",
      "role" => "El campo :attribute es requerido."
    ];

    $this->validate($req, $reglas, $mensajes);

  //APLICAR MODIFICACION
    $usuario= User::where('email', 'LIKE', $req->email)->get();
    $id= $usuario[0]->id;
    $usuarioMod = User::find($id);
    $usuarioMod->role = $req->role;

    $usuarioMod->save();

    return view('accesos');
  }
}
