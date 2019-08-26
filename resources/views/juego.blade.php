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


          @foreach ($series as $serie)
            @foreach ($serie->question as $question)

              <div class="tarjetaJuegoA">
                <h2 class="tituloA" data-serie-id="{{$serie->id}}" data-pregunta-id="{{$question->id}}" >{{$serie->name}} : {{$question->name}}
                  @if ($question->image != null)
                    <br>
                    <img class="imagen-pregunta" src="/storage/img/img_questions/{{$question->image}}" alt="{{$question->name}}">
                  @endif
                </h2>
                <div class="pregunta">

                @foreach ($question->answer as $answer)
                <div class="respuesta">
                  <button class="response" type="button" name="button" data-answer-question="{{$answer->question_id}}" data-correct = "{{$answer->correctAnswer}}">
                    @if ($answer->image != null)
                      <div class="imagen-respuesta">
                        <img src="/storage/img/img_answers/{{$answer->image}}" alt="{{$answer->name}}">
                      </div>
                    @else
                      {{$answer->name}}
                    @endif
                  </button>
                </div>

              @endforeach
            </div>
          </div>
            @endforeach

          @endforeach

    </section>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="/js/juego.js"></script>


  @endsection
