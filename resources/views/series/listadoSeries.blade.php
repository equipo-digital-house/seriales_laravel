<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
  </head>
<body>
    <div class="container">
          <div class="alert alert-dark" role="alert">
          <h2 class="display-6 text-center">Listado de Series - Preguntas y Respuestas</h2>
          </div>


        <table class="table table-bordered text-center">

          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Series</th>
              <th scope="col">Nombre</th>
              <th scope="col">Preguntas</th>
              <th scope="col">Modificar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody>
              @php ($cont=1)
              @foreach ($series as $serie)
                  <tr>

                  <th scope="row">{{$cont++}}</th>

                   @if($serie->image!=NULL)
                     <td><img src="{{$serie->image}}" alt="" class="img-fluid rounded" width="100px"></td>
                   @else
                   <td>Sin Imagen</td>
                   @endif

                  <td>{{$serie->name}}</td>

                  <td><a href="/listadoPreguntas/{{$serie->id}}">
                        <i class="far fa-eye"></i>
                      </a>
                  </td>
                  <td><a href="/modificarSerie/{{$serie->id}}">
                        <i class="far fa-edit"></i>
                      </a>
                  </td>
                  <td><a href="/eliminarSerie/{{$serie->id}}">
                        <i class="far fa-trash-alt"></i>
                      </a>
                  </td>

                </tr>
            @endforeach
          </tbody>
      </div>

  <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" href={{ URL::to('administrador') }}><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/nuevaSerie"><i class="fas fa-plus-circle"></i>Nueva Serie</a>
  </li>

</ul>
