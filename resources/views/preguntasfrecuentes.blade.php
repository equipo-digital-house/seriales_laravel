@extends('layouts.master')

@section('content')

<!-- SECCIÓN DE PREGUNTAS FRECUENTES -->

  <div class="container-fluid p-0">

    <main class="main-pf">
      <section class="preguntas-frecuentes">

        <div class="accordion" id="accordion">

          @foreach ($preguntasFrecuentes as $index => $pregunta)

          <div class="card">

          <div class="card-header" id="heading-{{$index}}">
          <h2 class="mb-0">
          <button class="font-preguntas btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapse-{{$index}}">

            {{$pregunta->id}}. {{$pregunta->name}}

          </button>
          </h2>
          </div>


          <div id="collapse-{{$index}}" class="collapse"
            aria-labelledby="heading-{{$index}}" data-parent="#accordion">

            <div class="card-body">
              {{$pregunta->answer}}
            </div>

          </div>

          </div>
            @endforeach
        </div>
      </section>

     </main>
    </div>
@endsection
