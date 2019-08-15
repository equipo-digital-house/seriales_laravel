@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="card">
    <h5 class="card-header">Eliminar Pregunta</h5>
    <div class="card-body">

      <form class="" action="" method="post">
        <div class="form-group">

           @foreach ($serieSeleccionada as $key => $value):
            @if($value["image"]!=NULL):?>
            <img class="img-thumbnail rounded rounded mx-auto d-block" src="<?=$value["image"]?>" width=300px alt="">
           @endif
            <h3><?= $value["name"] ?></h3>
            <br>

          @endforeach
    @endif

    @if($mostrarPreguntas!=NULL)

      <h4>Pregunta:<?= $mostrarPreguntas[0]["pregunta"] ?></h4>
      <h4>Nivel:<?= $mostrarPreguntas[0]["nivel"] ?></h4>
      <h4>Puntaje:<?= $mostrarPreguntas[0]["score"] ?></h4>

      <br>



      @foreach ($mostrarPreguntas as $key => $value)
               @php$acum++

       <h4>Respuestas Asociadas <?=$acum?>:<?=$mostrarPreguntas[$key]["name"]?> </h4>

    @endforeach;

  endif

@if($acum!=0)
    <div class="alert alert-danger" role="alert">
  <p>La pregunta seleccionada, tiene <?= $acum;?> respuestas asociadas, si eliminas la pregunta se ELIMINARAN LAS RESPUESTAS ASOCIADAS A LA Pregunta </p>

  </div>
@else
    <div class="alert alert-success" role="alert">
  <p>La Pregunta  no tiene respuestas asociadas.</p>
  </div>
@endif

    <form>
    </div>

        <form class="" action="" method="post">
          <p>Esta seguro que quiere eliminar esta Pregunta?</p>
          <input type="submit" name="borrar" value="Si">
          <input type="submit" name="no" value="No">
          <input type="hidden" name="id" value="<?=$id_series;?>">
       </form>

</div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
