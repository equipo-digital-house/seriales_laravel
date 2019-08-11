@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="es" dir="ltr">

<body>

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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
@endsection
