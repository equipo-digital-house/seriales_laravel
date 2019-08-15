@extends('layouts.admin')
@section('content')
     <div class="container-fluid">

<!--Formulario para agregar preguntas frecuentes-->

       <section class="formulario">
         <div id="formContainer" class="row align-items-center">
            <div class="col-sm-10 offset-md-1">

            <h2 class="tituloAdminFaq1" class="text-center">Agregar pregunta frecuente</h2>

            <form id="formulario"  class="form" name="preguntasFrecuentes" novalidate action="/administradorpreguntasfrecuentes"  method="POST">
            @csrf

            <div class="form-group">
            <label for="name">Pregunta</label>
            <input required name="name" type="text" class="form-control" id="name" placeholder="Pregunta">
            </div>

            <div class="form-group">
            <label for="answer">Respuesta</label>
            <textarea name="answer" rows="8" cols="80" id="answer" class="row align-items-left"></textarea>
            </div>

            <button class="guardarFaq" type="submit" class="btn">Guardar</button>
            </form>


<!--Listado de preguntas frecuentes-->

        <div class="spacer"></div>
          <h2 class="tituloAdminFaq2">Listado de preguntas frecuentes</h2>

          <div class="spacer"></div>
          <table class="table">

              <thead>
                  <tr>
                      <th>Pregunta</th>
                      <th>Respuesta</th>
                      <th><i class="fas fa-edit"></i></th>
                      <th><i class="fas fa-trash"></i></th>
                  </tr>
              </thead>

              <tbody>
                  @foreach ($preguntasFrecuentes as $key => $pregunta)
                  <tr>
                      <td>{{$pregunta->name}}</td>
                      <td>{{$pregunta->answer}}</td>
                      <td>
                          <a href="/editarpreguntafrecuente/update/{{$pregunta->id}}"><i class="fas fa-edit"></i></a>
                      </td>
                      <td>
                          <a href="/borrarFaq/{{$pregunta->id}}"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>

          </table>

            <a class="flechaVolver" href="/administrador"><i class="fas fa-long-arrow-alt-left"></i></a>
            </div>
          </div>
        </div>
      </section>

    </div>

@endsection
