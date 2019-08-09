@extends('layouts.master')

@section('content')
<div class="container">
{{--
  require_once("autoload.php");
  if(!isset($_SESSION["email"])) {
      redirect("registro.php");
  }


  $avatar=null;

  $userSession= BaseMYSQL::buscarPorEmail($_SESSION["email"],$pdo,'users');

  if($_POST) {
    $datoModificado= $_POST['seleccion'];

    $errores= $validar->validarperfil($_POST);

      if(count($errores)==0){
        if($_FILES) {
          $avatar = $registro->armarAvatar($_FILES);
          $userSession['avatar'] = $avatar;
        } else {
          $avatar = $userSession['avatar'];
        }

       switch($datoModificado) {
         case 1 :
         $userSession['name'] = $_POST["nombre"];
         $userSession['email'] = $_POST["email"];
         break;

         case 2 :
         $userSession["avatar"] = $avatar;
         break;

         case 3 :
         $userSession["password"]= Encriptar::hashPassword($_POST["password"]);
         break;
       }

      $accion= BaseMYSQL::actualizarUsuario($userSession, $pdo, $avatar);

    }
  }
   ?> --}}

    <section class="row  text-center ">
      <article class="col-12" >

        <div class="avatar">
          <img src="img/img_perfil/{{Auth::User()->avatar}}" width="120" height="120" alt="Avatar">
        </div>

       <h2 class="titulo">Bienvenid@, {{Auth::User()->name}}</h2>
         <div class="row">
           <div class="col-12 col-lg-6 offset-lg-3">

           {{-- @if($_POST) {
             $validar->mostrarErrores($errores, isset($accion));
           } --}}

<!-- SECCION DE DATOS DE USUARIO -->
           <div class="accordion" id="accordionExample">
             <div class="card">
               <div class="card-header" id="headingOne">
                 <h2 class="mb-0">
                   <button class="btn btn-link font-preguntas" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     Datos del Usuario
                   </button>
                 </h2>
               </div>

               <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                 <div class="card-body">
                   <p>Nombre usuario: {{Auth::User()->name}}</p>
                   <p>Email: {{Auth::User()->email}}</p>
                 </div>
                </div>
             </div>

<!-- SECCION DE MODIFICAR DATOS -->

           <div class="card">
             <div class="card-header" id="headingTwo">
               <h2 class="mb-0">
                 <button class="btn btn-link collapsed font-preguntas" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   Modificar Datos
                 </button>
               </h2>
             </div>

             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
               <div class="card-body">
                 <form class="registro" action="perfil.php" method="post" enctype= "multipart/form-data">
                   <label for="nombre">Nombre de usuario*</label>
                   <input type="text" name="nombre" value="{{Auth::User()->name}}" required>
                   <label for="email">Tu correo electrónico*</label>
                   <input type="email" name="email" value="{{Auth::User()->email}}"required>

                   <input type="hidden" name="seleccion" value="{{1}}">

                   <button class="btn-formulario" type="submit" name="submit">Modificar</button>

                 </form>
               </div>
             </div>
           </div>

<!-- SECCION DE AGREGAR/MODIFICAR IMAGEN -->
           <div class="card">
             <div class="card-header" id="headingThree">
               <h2 class="mb-0">
                 <button class="btn btn-link collapsed font-preguntas" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                   Cambiar Imagen
                 </button>
               </h2>
             </div>
             <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
               <div class="card-body">
                 <form class="registro" action="perfil.php" method="post" enctype= "multipart/form-data">
                   <label for="avatar">Foto de tu perfil:</label>
                   <input  type="file" name="avatar" value="">
                   <input type="hidden" name="seleccion" value="{{2}}">
                   <button class="btn-formulario" type="submit" name="submit">Modificar</button>
                 </form>
               </div>
             </div>
           </div>

<!-- SECCION DE CAMBIAR CONTRASENA -->
           <div class="card">
             <div class="card-header" id="headingThree">
               <h2 class="mb-0">
                 <button class="btn btn-link collapsed font-preguntas" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                   Cambiar Contraseña
                 </button>
               </h2>
             </div>
             <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
               <div class="card-body">
                 <form class="registro" action="perfil.php" method="post" enctype= "multipart/form-data">
                 <label for="password">Nueva Contraseña *</label>
                 <input type="password" name="password" value=""required>
                 <label for="repassword">Repetir Contraseña*</label>
                 <input type="password" name="repassword" value=""required>
                 <input type="hidden" name="seleccion" value="{{3}}">
                 <button class="btn-formulario" type="submit" name="submit">Modificar</button>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>

    <div class="my-3">
      <a class="btn-cerrar" href="logout.php">Cerrar Sesión</a>
    </div>

    </article>
  </section>
@endsection
