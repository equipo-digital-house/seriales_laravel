@extends('layouts.admin')
@section('content')
  <div class="row">
  <div class="col-md-6 offset-md-3">
  <div class="card">
    <h5 class="card-header">Eliminar Serie</h5>
    <div class="card-body">

  <form class="eliminarSerie" action="{{URL::to('/eliminarSerie')}}" accept-charset="UTF-8" method="post" enctype= "multipart/form-data">
    @csrf
        <div class="form-group">

          @if(isset($serie))
              @if($serie->image!=NULL)
                <img class="img-thumbnail rounded rounded mx-auto d-block" src="/storage/img/series/{{$serie->image}}" width=300px alt="">
               @endif
                <h3>{{$serie->name}}</h3>

                <br>

                @php ($asociacion=$serie->question->count())
                      @if($asociacion!=0)
                        <p>La serie tiene {{$asociacion}} preguntas asociadas.</p>
                        <p>¿Desea Eliminar la serie y sus asociaciones?</p>

                        <table class="table table-bordered text-center">

                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Preguntas asociadas</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php ($cont=1)
                              @foreach ($serie->question as $question)
                                  <tr>
                                  <th scope="row">{{$cont++}}</th>
                                  <td>{{$question->name}}</td>
                                 </tr>
                            @endforeach
                          </tbody>
                        </table>
                      @else
                        <p>La serie tiene NO tiene preguntas asociadas.</p>
                        <p>¿Desea Eliminar la serie?</p>

                      @endif

          @endif
</div>
</div>
</div>

<button name="Eliminar"type="submit" class="btn btn-primary" value="si">Eliminar</button>
<button name="Cancelar"type="submit" class="btn btn-primary" value="no">Cancelar</button>
<input type="hidden" name="id" value="{{$serie->id}}">
</form>
   </div>
   </div>

@endsection
