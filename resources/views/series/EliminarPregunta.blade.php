@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="card">
    <h5 class="card-header">Eliminar Pregunta</h5>
    <div class="card-body">

      <form class="eliminarPregunta" action="{{URL::to('/eliminarPregunta')}}" accept-charset="UTF-8" method="post" enctype= "multipart/form-data">
        @csrf
            <div class="form-group">

    @if(isset($question->serie))
        @if($question->serie->image!=NULL)
          <img class="img-thumbnail rounded rounded mx-auto d-block" src="/storage/img/series/{{$question->serie->image}}" width=300px alt="">
         @endif
         <br>
          <h3 class="text-center">{{$question->name}}</h3>

          <br>
        <ul>
          <p>La pregunta tiene {{$question->answer->count()}} respuestas asociadas. ¿Desea Eliminar la pregunta y sus asociaciones?</p>

          <table class="table table-bordered text-center">

            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Listado de respuestas asociadas</th>
                </tr>
            </thead>
            <tbody>
                @php ($cont=1)
                @foreach ($question->answer as $answer)
                    <tr>
                    <th scope="row">{{$cont++}}</th>
                    <td>{{$answer->name}}</td>
                   </tr>
              @endforeach
            </tbody>

    </div>
    @endif
    <button name="Eliminar"type="submit" class="btn btn-primary" value="si">Eliminar</button>
    <button name="Cancelar"type="submit" class="btn btn-primary" value="no">Cancelar</button>
    <input type="hidden" name="id" value="{{$question->id}}">
    </form>
       </div>
       </div>
  </div>
  </div>
    @endsection
