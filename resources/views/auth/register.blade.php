@extends('layouts.master')

@section('content')
  <main>

    <h3 class="subtitulo">¿Todavía no tenés cuenta?</h3>
    <div class="titulo">{{ __('Registrate en segundos') }}</div>

      <div class="row">
          <div class="col-12 col-lg-6 offset-lg-3">

              <form id= "formularioRegistro" name="formularioRegistro" class="registro" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  @csrf


                <label for="name">{{ __('Nombre de usuario*') }}</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
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


                <label for="password-confirm">{{ __('Repetir contraseña*') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">


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
