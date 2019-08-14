@extends('layouts/admin')
@section('content')

<section class="formulario">
 <div id="formContainer" class="row align-items-center">

    <div class="col-sm-10 offset-md-1">
      <h2 class="tituloAdminFaq1" class="text-center">Editar Permisos</h2>

      <form id="formulario" class="form" novalidate action=""  method="POST">

      @csrf

        <div class="form-group">
          <label for="email">Email del usuario</label>
          <input required name="email" type="email" class="form-control" id="email" placeholder="Email de Usuario">
        </div>

        <label for="access">Nivel de Acceso</label>
        <select class="custom-select" name="role" multiple>
          <option value=0 selected>Jugador</option>
          <option value=9>Administrador</option>
        </select>

        <button class="guardarFaq" type="submit" class="btn">Guardar</button>
      </form>

      <a class="nav-link" href={{ URL::to('administrador') }}><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
    </div>
  </div>

@endsection
