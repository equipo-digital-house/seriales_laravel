<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="master.css">
  <title>Registro de Datos</title>
</head>

<body>

  <div class="container">

      @if(count($errors)>0)
        <ul class="alert alert-danger">

          @foreach ($errors as $error)
            <li> {{$error}}</li>
          @endforeach
      @endif
      <div class="row">
        <div class="col-md-6 offset-md-3">

                      <div class="alert alert-dark" role="alert">
                          <h2 class="display-6 text-center">Pregunta</h2>
                        </div>
                        <div class="img-thumbnail">

                          <img src="/{{$question->serie->image}}" alt="" class="img-fluid rounded mx-auto d-block" width="100px">

                          <h2 class="text-center">{{$question->serie->name}}</h2>
                        </div>
                        <br>
                        <div class="alert alert-dark" role="alert">
                            <h2 class="display-6 text-center">Respuestas</h2>
                          </div>

                      <form class="registro" action="/nuevaRespuesta" method="post" enctype= "multipart/form-data">

                      <div class="form-group form-check">
                        <input name="checkRespuesta" type="checkbox" class="form-check-input" id="checkRespuesta">
                        <label class="form-check-label" for="checkRespuesta">Las Respuestas tendrán imagenes asociadas</label>
                      </div>
                      <div class="form-group">
                        <label for="inputRespuesta1">#1 Respuesta</label>
                        <input name="respuesta1" type="text" class="form-control" id="inputRespuesta1" aria-describedby="respuesta1Help" placeholder="Respuesta1">
                        <small id="respuesta1Help" class="form-text text-muted">Si la pregunta tiene asociada una imagen, checkea en agregar imagen</small>
                      </div>
                      <div class="form-group">
                          <input name="fileRespuesta1" type="file" class="form-control-file" id="fileRespuesta1">
                          <small id="fileRespuesta1" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                        </div>
                        <div class="form-group">
                          <label for="inputRespuesta2">#2 Respuesta</label>
                          <input name="respuesta2"type="text" class="form-control" id="inputRespuesta2" aria-describedby="respuesta2Help" placeholder="Respuesta2">

                        </div>
                        <div class="form-group">
                            <input name="fileRespuesta2"type="file" class="form-control-file" id="fileRespuesta2">
                            <small id="fileRespuesta2" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                          </div>
                          <div class="form-group">
                            <label for="inputRespuesta3">#3 Respuesta</label>
                            <input name="respuesta3"type="text" class="form-control" id="inputRespuesta3" aria-describedby="respuesta3Help" placeholder="Respuesta3">

                          </div>
                          <div class="form-group">
                              <input name="fileRespuesta3" type="file" class="form-control-file" id="fileRespuesta3">
                              <small id="fileRespuesta3" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                            </div>
                            <div class="form-group">
                              <label for="inputRespuesta4">#4 Respuesta</label>
                              <input name="respuesta4" type="text" class="form-control" id="inputRespuesta4" aria-describedby="respuesta4Help" placeholder="Respuesta4">

                            </div>
                            <div class="form-group">
                                <input name="fileRespuesta4"type="file" class="form-control-file" id="fileRespuesta4">
                                <small id="fileRespuesta4" class="form-text text-muted">Solo si ha activado Asociar Imagen podrá seleccionar una imagen. (png y jpg)</small>
                              </div>
                              <div class="form-group">
                              <label  for="selectCorrectAnswer">Seleccione cuál es la respuesta correcta</label>

                                <select name="selectPreguntaCorrecta" class="form-control" id="selectCorrectAnswer">

                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                              </select>
                              <br>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Respuestas</button>

    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>
    </div>
    </body>

    </html>
