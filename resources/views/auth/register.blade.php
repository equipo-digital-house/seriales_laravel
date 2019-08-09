@extends('layouts.master')

@section('content')
<?php $titulo = "Registro" ?>
<div class="container-fluid p-0">

  <main>

    <h3 class="subtitulo">¿Todavía no tenés cuenta?</h3>
    <div class="titulo">{{ __('Registrate en segundos') }}</div>

      <div class="row">
          <div class="col-12 col-lg-6 offset-lg-3">

              <form class="registro" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  @csrf


                <label for="nombre">{{ __('Nombre de usuario*') }}</label>

                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                  @error('nombre')
                      <span class="error">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror


                <label for="email">{{ __('Tu correo electrónico*') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="error">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror


                <label for="password">{{ __('Contraseña*') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                <label for="password_confirmation">{{ __('Repetir contraseña*') }}</label>

                <input id="repassword" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">


                <button type="submit" class="btn-formulario">
                    {{ __('¡Registrarme!') }}
                </button>

              </form>
          </div>
      </div>
    <p class="aclaracion">Los campos con * deben ser completados</p>
  </main>
</div>
@endsection
