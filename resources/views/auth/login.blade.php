@extends('layouts.master')

@section('content')
  <?php $titulo = "Login" ?>
  <main>
    <h3 class="subtitulo">¿Querés jugar?</h3>
    <h2 class="titulo">Iniciar sesion</h2>
    <div class="row">
      <div class="col-12 col-lg-6 offset-lg-3">
        <form id="formularioLogin" name="formularioLogin" method="POST" class="registro" action="{{ route('login') }}">
            @csrf
          <label for="email">{{ __('Email*') }}</label>

          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

          <span id="errorEmail" class="errorValJS"></span>


          <label for="password">{{ __('Contraseña*') }}</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

          <span id="errorPassword" class="errorValJS"></span>


          <button class="btn-formulario" type="submit" name="submit">{{ __('Iniciar Sesion') }}</button>
          <div class="recordar">
            <input value="recordarme" type="checkbox" name="recordarme" id="check1" {{ old('remember') ? 'checked' : '' }}>

            <label for="check1">
              {{ __('Recordarme') }}
            </label>
          </div>

          @if (Route::has('password.request'))
            <a class="olvidar-pass" href="{{ route('password.request') }}">
              {{ __('¿Olvidó su contraseña?') }}
            </a>
          @endif

          <div>
          <span class="irARegistro">¿No está registradx aún?<a class="olvidar-pass" href="{{ route('register') }}"> Registrate aquí</a></span>
          </div>
        </form>
      </div>
    </div>
    <p class="aclaracion">Los campos con * deben ser completados</p>
  </main>
</div>
<script src="/js/login.js"></script>
@endsection

