@extends('layouts.admin')
@section('content')

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
                     <td><img src="/storage/img/series/{{$serie->image}}" alt="" class="img-fluid rounded" width="100px"></td>
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
    <a class="nav-link" href="/administrador"><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/nuevaSerie"><i class="fas fa-plus-circle"></i>Nueva Serie</a>
  </li>

   </ul>

@endsection
