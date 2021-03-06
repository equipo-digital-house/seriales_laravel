@extends('layouts.master')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Resetear Contraseña ') }}</div>
                  <br>
                  <p class="text-center">Le enviaremos un enlace para el restablecimiento de contraseña</p>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese su Email:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar enlace') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<main>
      <h2 class="titulo">¿Olvidaste tu contraseña?</h2>
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <p class="text-center">Te enviaremos un enlace para el restablecimiento de contraseña</p>

          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <form class="contraseñaNueva" action="{{ route('password.email') }}" method="post" enctype="multipart/form-data">

            @csrf

            <label for="email">Ingresá tu email*</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button class="btn-formulario" type="submit" name="submit">{{ __('Enviar enlace') }}</button>
            <p class="aclaracion">Los campos con * deben ser completados</p>
            </div>
          </form>
        </div>
      </div>
    </main>
@endsection
