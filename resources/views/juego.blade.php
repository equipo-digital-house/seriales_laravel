@extends('layouts/master')
@section('content')


    <div class="container-fluid p-0">

      <section>
        <div class="">
          <p>Elige la serie que quieres jugar</p>
          <form class="" action="index.html" method="post">
            {{-- Desde el controlador de usuarios, mando dos variables cargadas con datos
          son la variable $usuario que es el usuario que esta logeado y
          la variable $series que trae todas las series--}}

          <select class="" name="serie">
              @foreach ($series as $serie)
                <option value="{{$serie->id}}">{{$serie->name}}</option>
              @endforeach
            </select>
          </form>
{{-- Aqui te muestro una pequeña informacion que se obtiene de la variables
$usuario sola--}}
        </div>
        <div class="">
          <p>Puntaje Acumulado</p>
          <ul>
            <li>{{$usuario->name}}</li>
            @if ($usuario->score==null)
            <li>Puntaje Usuario:0</li>
            @else
            <li>Puntaje{{$usuario->score}}</li>
            @endif

{{--Aca te muestro como la variable $usuario tiene conexion con la tabla
 question_users  a traves del metodo $usuario->questions
para obtener los valores que tiene esta tabla se debe usar el metodo pivot
(como son mas de un valor posible, lo mejor es recorrerla con un foreach),
 con esto leera la informacion de esta tabla), aqui un ejemplo--}}
@foreach ($usuario->questions as $questions)
          <li>Preguntas ya respondidas: {{$questions->pivot->question_id}}</li>
          <li>De la serie{{$questions->serie->name}}</li>
          <li>Respuesta usuario{{$questions->pivot->answer_user}}  </li>

@endforeach

{{-- Con la variable $series puedes recorrer de una serie a una pregunta a una respuesta,
con todas las columnas que existen en sus tablas, este es un ejemplo para que sepas
como se usan.
tambien de las conexiones $question-> puedes entrar a la tabla level con el metodo
$question->level->name--}}

{{--la idea es que con toda esta info puedas obtener lo que necesitas para generar
el juego con js.--}}

@foreach ($series as $serie)

  <li>{{$serie->name}}</li>
  @foreach ($serie->question as $question)
    <li>{{$question->name}}</li>
    <li>Nivel: {{$question->level->name}}</li>
    @foreach ($question->answer as $answer)
      <li>Name:{{$answer->name}} correctAnswer:{{$answer->correctAnswer}}</li>

    @endforeach
  @endforeach
@endforeach


          </ul>
        </div>
        <div class="tarjetaJuegoA">

          <h2 class="tituloA">Serie: Pregunta</h2>


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


  @endsection
