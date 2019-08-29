@extends('layouts.admin')
@section('content')
  <div class="container">

      <div class="row">
        <div class="col-md-8 offset-md-2">

          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Modificar Pregunta</h2>
            </div>
            <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="/listadoPreguntas/{{$question->serie->id}}"><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
            </li>
            </ul>
            <div class="img-thumbnail">
              <img src="/storage/img/series/{{$question->serie->image}}" alt="" class="img-fluid rounded mx-auto d-block" width="100px">
              <h2 class="text-center">{{$question->serie->name}}</h2>
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
            <form class="registro" action="{{url('/modificarPregunta')}}" method="post" enctype= "multipart/form-data">
            @csrf
            <div class="form-group">

            @if($question->image!=null)
              <div class="text-center">
                <img src="/storage/img/img_questions/{{$question->image}}" width="150px"alt="">
              </div>
              <label for="InputQuestion">Pregunta</label>
            @endif
            <input name="pregunta" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="questionHelp" value="{{$question->name}}">

            <label for="selectPregunta">Nivel de Pregunta</label>
            <select name="selectNivel" class="form-control" id="selectPregunta" value="{{$question->level->id}}">

              @foreach ($levels as $level)
              <option value="{{$level->id}}">{{$level->name}}</option>
             @endforeach
               <option value="{{$question->level->id}}">{{$question->level->name}}</option>
            </select>
            <br>

                      @csrf
                      @php($cont=1)
                      @foreach($question->answer as $answer)
                      <div class="form-group">
                        <label for="inputRespuesta1">#{{$cont}} Respuesta</label>
                        @if($answer->image!=null)
                        <div class="text-center">
                          <img src="/storage/img/img_answers/{{$answer->image}}" width="150px"alt="">
                        </div>

                        @endif
                        <input name="respuesta{{$cont}}" type="text" class="form-control" id="inputRespuesta{{$cont}}"  value="{{$answer->name}}">
                        <input name="answer{{$cont}}" type="hidden" class="form-control"  value="{{$answer->id}}">
                              @if($answer->correctAnswer!=0)
                                @php($respuestaCorrecta=$answer->correctAnswer)
                              @endif
                      </div>
                      @php($cont++)
                    @endforeach

                              <div class="form-group">
                              <label  for="selectCorrectAnswer">Respuesta correcta</label>

                                <select name="selectRespuestaCorrecta" class="form-control" id="selectCorrectAnswer">
                                          <option>{{$respuestaCorrecta}}</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>


                              </select>
                              <br>
                            </div>
                            <input type="hidden" name="question_id" value="{{$question->id}}">
                            <input type="hidden" name="serie_id" value="{{$question->serie->id}}">
                            <button type="submit" class="btn btn-primary">Update Respuestas</button>

    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>
    </div>
    </body>

    </html>
