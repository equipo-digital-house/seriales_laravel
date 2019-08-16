<!DOCTYPE html>
@php($cont=1)

<html lang="es" dir="ltr">
  <head>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>{{$serie->name}}</title>
  </head>
  <body>
    <div class="container">
      <div class="alert alert-dark" role="alert">
          <h2 class="display-6 text-center">Listado de Preguntas</h2>
        </div>

      <div class="img-thumbnail">
        <img src="/storage/img/series/{{$serie->image}}" alt="" class="img-fluid rounded mx-auto d-block" width="100px">
        <h2 class="text-center">{{$serie->name}}</h2>
      </div>

      <div class="submenu">
            <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="/listadoSeries"><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/nuevaPregunta/{{$serie->id}}"><i class="fas fa-plus-circle"></i>Nueva Pregunta</a>
            </li>

            </ul>

      </div>

          <table class="table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Preguntas</th>
                <th scope="col">Imagen</th>
                <th scope="col">Nivel</th>
                <th scope="col">Puntaje</th>
                <th scope="col">Respuestas</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>

                   @foreach ($serie->question as $question)
                    <tr>
                    <th scope="row">{{$cont++}}</th>
                        <td>{{$question->name}}</td>
                        @if($question->image!=NULL)
                        <td><img src="/storage/img/img_questions/{{$question->image}}" alt="" class="img-fluid rounded" width="100px"></td>
                         @else<td>Sin Imagen</td>
                         @endif
                        <td>{{$question->level->name}}</td>
                        <td>{{$question->level->score}}</td>
                        <td><a href="/listadoRespuestas/{{$question->id}}"><i class="far fa-eye"></i></a></td>
                        <td><a href="/eliminarPregunta/{{$question->id}}"><i class="far fa-trash-alt"></i></a></td>
                  </tr>
              @endforeach
            </tbody>
            </table>


    </div>
