<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="master.css">
  <title>Registro de Datos</title>
</head>

<body>

  <div class="container">

      <div class="row">
        <div class="col-md-6 offset-md-3">

          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Nueva Pregunta</h2>
            </div>
            <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="/listadoPreguntas/{{$serie->id}}"><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
            </li>
            </ul>
            <div class="img-thumbnail">
              <img src="/{{$serie->image}}" alt="" class="img-fluid rounded mx-auto d-block" width="100px">
              <h2 class="text-center">{{$serie->name}}</h2>
            </div>
            @if(count($errors)>0)
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
          </div>
        @endif
          <form class="registro" action="/nuevaPregunta" method="post" enctype= "multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="InputQuestion">Pregunta</label>
            <input name="pregunta" type="text" class="form-control" value="" id="exampleInputEmail1" aria-describedby="questionHelp" placeholder="Ingrese pregunta" value="{{old('pregunta')}}">
            <small id="questionHelp" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
          </div>
          <div class="form-group form-check">
            <input name="checkPregunta" type="checkbox" class="form-check-input" id="checkIddQuestion" value="{{old('checkPregunta')}}">
            <label class="form-check-label" for="checkIddQuestion">Asociar imagen a la pregunta</label>
          </div>
          <div class="form-group">
              <input name="filePregunta" type="file" class="form-control-file" id="filePregunta">
              <small id="filePregunta" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
            </div>
            <div class="form-group">

            <label for="selectPregunta">Seleccione el Nivel de Pregunta</label>
            <select name="selectNivel" class="form-control" id="selectPregunta" value="{{old('selectNivel')}}">
              @foreach ($levels as $level)
              <option value="{{$level->id}}">{{$level->name}}</option>
             @endforeach
            </select>
            <br>
          </div>
          <input type="hidden" name="serie_id" value="{{$serie->id}}">
      <button type="submit" class="btn btn-primary">Guardar Pregunta</button>

    </form>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </div>
</div>
</body>

</html>
