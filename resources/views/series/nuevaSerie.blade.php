@extends('layouts.admin')
@section('content')
        <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="alert alert-dark" role="alert">
              <h2 class="display-6 text-center">Nueva Serie</h2>
          </div>
          <div >
            <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="/administrador"><i class="fas fa-arrow-circle-left" alt="Retornar"></i>Retornar</a>
            </li>
            </ul>
          </div>
          @if(count($errors)>0)
            <ul class="alert alert-danger">

              @foreach ($errors->all() as $error)
                <li> {{$error}}</li>
              @endforeach
          @endif
          </ul>
          <form class="agregarSerie" action="/nuevaSerie" accept-charset="UTF-8" method="post" enctype= "multipart/form-data">
            @csrf
                <div class="form-group">
                      <label for="InputSerie">Nombre Serie</label>
                      <input name="nameSerie" type="text" class="form-control"  value="" id="InputSerie"  placeholder="Ingrese Serie" value="{{old('nameSerie')}}">

                 </div>


                <div class="form-group">
                      <input name="avatar" type="file" class="form-control-file" id="fileSerie" value="{{old('avatar')}}">
                      <small id="fileSerie" class="form-text text-muted">Se solicita ingrese el logo de la serie. (png y jpg)</small>

                </div>


                      <button name="submit" type="submit" class="btn btn-primary">Guardar Serie</button>
          </form>
        </div>

      </div>
      @endsection
