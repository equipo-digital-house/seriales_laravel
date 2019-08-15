@extends('layouts/master')
@section('content')

  <main class="inicio">
    <div id="carouselSeries" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="4000">
          <img src="/imgsitio/gameOfThrones.png" class="d-block w-100" alt="GOT">
        </div>
        <div class="carousel-item" data-interval="5000">
          <img src="/imgsitio/explicacion1.png" class="d-block w-100" alt="Seriales">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/orangeIsTheNewBlack.png" class="d-block w-100" alt="OITNB">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/seinfeld.png" class="d-block w-100" alt="Seinfeld">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/theWalkingDead.png" class="d-block w-100" alt="TWD">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/friends.png" class="d-block w-100" alt="Friends">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/vikings.png" class="d-block w-100" alt="Wikings">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/theBigBangTheory.png" class="d-block w-100" alt="TBBT">
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselSeries" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#carouselSeries" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      </div>

          <div class="botonJugarIndex">
            @if(Auth::User())
            <a class="botonJugar" href="{{ URL::to('juego') }}">¡Jugar!</a>
            @else
            <a class="botonJugar" href="{{ URL::to('register') }}">¡Jugar!</a>
            @endif
      </div>

</main>


@endsection
