@extends('layouts/master')
@section('content')

  {{-- MODAL --}}
  <div class="modal-status">
  </div>
    <div class="modal">
      <div class="modal-content">
        <p class= "titulo">Elige la serie que quieres jugar</p>

        <form id="series-form" method="POST">
          @csrf
          <div class="lista-series">
            @foreach ($series as $serie)
              <div class="serie">
                <input class="serie-checked" name="series[]" id="{{$serie->id}}" type="checkbox" value="{{$serie->id}}">
                <label class="series" for= "{{$serie->id}}">
                  {{$serie->name}}
                </label><br>
              </div>
            @endforeach
          </div>
          <button type='submit' class="btn-formulario btn-ubicacion">Jugar</button>
        </form>
      </div>
    </div>
  {{-- END MODAL --}}


    <div class="container-fluid p-0">

      <section>

        <div class="tarjetaJuegoA">

          @foreach ($series as $serie)
              @foreach ($serie->question as $question)
                <h2 class="tituloA" id="{{$serie->id}}">{{$serie->name}} : {{$question->name}}</h2>
              @endforeach

          @endforeach


            <div class="pregunta">
              <div class="respuesta">
                <button type="button" name="button">Respuesta 1</button>
              </div>

              <div class="respuesta">
                <button type="button" name="button">Respuesta 2</button>
              </div>

              <div class="respuesta">
                <button type="button" name="button">Respuesta 3</button>
              </div>

              <div class="respuesta">
                <button type="button" name="button">Respuesta 4</button>
              </div>
            </div>

      </div>
    </section>


    </div>
    <script src="/js/juego.js"></script>


  @endsection
