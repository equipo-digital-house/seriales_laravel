@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <section class="row  text-center ">
      <article class="col-12" >

        <div class="avatar">
          <img src="/storage/avatars/{{$usuarioLog->avatar}}" width="120" height="120" alt="Avatar">
        </div>

       <h2 class="titulo">Bienvenid@, {{$usuarioLog->name}}</h2>
         <div class="row">
           <div class="col-12 col-lg-6 offset-lg-3">

           @if (count($errors->all()) != 0)
             <ul class="alert alert-danger">
               @foreach ($errors->all() as $error)
                 <li>{{$error}}</li>
               @endforeach
             </ul>
           @endif

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
                   <p>Nombre usuario: {{$usuarioLog->name}}</p>
                   <p>Email: {{$usuarioLog->email}}</p>
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
                 <form class="registro" action="{{ URL::to('perfil') }}" method="post" enctype= "multipart/form-data">
                   {{ csrf_field() }}

                   <label for="nombre">Nombre de usuario*</label>
                   <input type="text" name="name" value="{{$usuarioLog->name}}" required>
                   <label for="email">Tu correo electrónico*</label>
                   <input type="email" name="email" value="{{$usuarioLog->email}}"required>

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
                 <form class="registro" action="{{ URL::to('perfil') }}" method="post" enctype= "multipart/form-data">
                   {{ csrf_field() }}
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
                 <form class="registro" action="{{ URL::to('perfil') }}" method="post" enctype= "multipart/form-data">
                   {{ csrf_field() }}
                 <label for="password">Nueva Contraseña *</label>
                 <input type="password" name="password" value=""required>

                 <label for="password-confirm">Repetir Contraseña*</label>
                 <input id="password-confirm" type="password" name="password_confirmation" required>
                 <input type="hidden" name="seleccion" value="{{3}}">
                 <button class="btn-formulario" type="submit" name="submit">Modificar</button>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>

    <div class="my-3">
      <a class="btn-cerrar" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
      {{ __('Cerrar Sesión') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
      </form>
    </div>

    </article>
  </section>
@endsection
