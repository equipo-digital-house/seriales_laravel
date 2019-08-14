<!DOCTYPE html>

@php($cont=1)


<html lang="es" dir="ltr">
  <head>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <title><{{$question->serie->name}}</title>
  </head>
  <body>

    <div class="container">
      <div class="img-thumbnail">
        <img src="/{{$question->serie->image}}" alt="" class="img-fluid rounded mx-auto d-block" width="200px">
      </div>
      <h2 class="text-center">{{$question->name}}</h2>
      <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="/listadoPreguntas/{{$question->serie->id}}"><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
      </li>
      </ul>
        <div class="">
          <table class="table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Respuestas</th>
                <th scope="col">Correcta</th>
                <th scope="col">imagen</th>


              </tr>
            </thead>
            <tbody>
                @foreach ($question->answer as $answer)
                  <tr>

                    <th scope="row">{{$cont++}}</th>
                    <td>{{$answer->name}}</td>
                    <td>{{$answer->correctAnswer}}</td>
                     @if($answer->image!=NULL)
                       <td><img src="/{{$answer->image}}" alt="" class="img-fluid rounded" width="100px"></td>
                     @else <td>Sin Imagen</td>
                     @endif



                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
