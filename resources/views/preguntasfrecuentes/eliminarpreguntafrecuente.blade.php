@extends('layouts.admin')
@section('content')
<body>

    <section class="formulario">

      <div class="col-sm-4 offset-md-4" style="text-align:center;">

        <form class="" action="" method="post">
            <h3 class="eliminarPreguntaFrecuente">¿Eliminar pregunta frecuente?</h3>
            <input class="eliminarFaq" type="submit" name="borrar" value="si">
            <input class="eliminarFaq" type="submit" name="no" value="no">
            <input type="hidden" name="id" value="$preguntaFrecuente->id">
         </form>

         <a class="flechaVolver" href="/administradorpreguntasfrecuentes"><i class="fas fa-long-arrow-alt-left"></i></a>
      </div>

    </section>
</body>
@endsection
