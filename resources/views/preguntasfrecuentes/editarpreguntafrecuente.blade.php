@extends('layouts.admin')
@section('content')
<body>
  <section class="formulario">
    <div class="col-sm-10 offset-md-1">

      <h3 class="tituloAdminFaq3">Editar pregunta frecuente</h3>

      <form action="" method="post" enctype="multipart/formdata">
        {{ method_field('PATCH') }}
        @csrf

        <div class="form-group">
          <label for="pregunta">Pregunta</label>
          <input type="text" class="form-control" name="name" value="{{$preguntaFrecuente->name}}">
        </div>

        <div class="form-group">
          <label for="pregunta">Respuesta</label>
          <textarea for="respuesta" name="answer" rows="8" cols="80" class="form-control">{{$preguntaFrecuente->answer}}</textarea>
        </div>

        <button class="modificarFaq" type="submit" name="modificar" class="btn">Modificar pregunta frecuente</button>

      </form>

      <a class="flechaVolver" href={{ URL::to('administradorpreguntasfrecuentes') }}><i class="fas fa-long-arrow-alt-left"></i></a>
        </div>

  </section>
</body>

@endsection
