@extends('layouts.master')

@section('content')
  <main>

    <h3 class="subtitulo">¿Todavía no tenés cuenta?</h3>
    <div class="titulo">{{ __('Registrate en segundos') }}</div>

      <div class="row">
          <div class="col-12 col-lg-6 offset-lg-3">

              <form id="formularioRegistro" name="formularioRegistro" class="registro" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  @csrf


                <label for="name">{{ __('Nombre de usuario*') }}</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                  @error('name')
                      <span class="error">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                  <span id="errorName" class="errorValJS"></span>


                <label for="email">{{ __('Tu correo electrónico*') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                  @error('email')
                      <span class="error">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                  <span id="errorEmail" class="errorValJs"></span>


                <label for="password">{{ __('Contraseña*') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <span id="errorPassword" class="errorValJS"></span>


                <label for="password-confirm">{{ __('Repetir contraseña*') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">

                <span id="errorPassword_confirmation" class="errorValJS"></span>

                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="terCo" name="terCo">
                  <label class="form-check-label" for="terCo">
                    <button id="terCoButton" type="button" class="btn btn-link" data-toggle="modal" data-target="#terCoModal">{{ __('Spoiler alert') }}</button>
                  </label>
                  <span id="errorTerCo" class="errorValJS"></span>
                </div>


                <button type="submit" class="btn-formulario">
                    {{ __('¡Registrarme!') }}
                </button>

              </form>
          </div>
      </div>
    <p class="aclaracion">Los campos con * deben ser completados</p>

    <!-- Modal de spoiler alert -->

    <div id="terCoModal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">SPOILER ALERT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="terms-text">
              Seriales contiene información sobre todas las temporadas de las series con las que puedes jugar. Por lo tanto, es nuestro deber avisarte que podrías ser víctima de spoilers en algunas de las preguntas. ¡Estás avisadx! ;)
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" id="botonModal" class="btn btn-link" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

  </main>
</div>
@endsection
<script src="/js/register.js"></script>
