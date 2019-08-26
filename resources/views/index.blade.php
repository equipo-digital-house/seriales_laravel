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


      <div id="carouselSeries-mobile" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="4000">
          <img src="/imgsitio/got_v.png" class="d-block w-100" alt="GOT">
        </div>
        <div class="carousel-item" data-interval="5000">
          <img src="/imgsitio/explicacion_v.png" class="d-block w-100" alt="Seriales">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/friends_v.png" class="d-block w-100" alt="Friends">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/twd_v.png" class="d-block w-100" alt="TWD">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/oitnb_v.png" class="d-block w-100" alt="OITNB">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/seinfeld_v.png" class="d-block w-100" alt="Seinfeld">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/tbbt_v.png" class="d-block w-100" alt="TBBT">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="/imgsitio/vikings_v.png" class="d-block w-100" alt="Vikings">
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselSeries-mobile" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#carouselSeries-mobile" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      </div>



        <!-- <script>

          var i = 0;
          var imagenes = [];
          var tiempo = 5000;

          imagenes[0] = "/imgsitio/gameOfThrones.png";
          imagenes[1] = "/imgsitio/explicacion1.png";
          imagenes[2] = "/imgsitio/orangeIsTheNewBlack.png";
          imagenes[3] = "/imgsitio/Seinfeld.png";
          imagenes[4] = "/imgsitio/theBigBangTheory.png";
          imagenes[5] = "/imgsitio/theWalkingDead.png";
          imagenes[6] = "/imgsitio/vikings.png";
          imagenes[7] = "/imgsitio/friends.png";

          function cambiarImg(){
            document.slide.src = imagenes[i];

            if(i < imagenes.length - 1){
              i++;
            } else {
              i = 0;
            }

            setTimeout("cambiarImg()", tiempo);
          }

          window.onload = cambiarImg;

        </script>

        <img name="slide" width="100%"> -->


          <div class="botonJugarIndex">
            @if(Auth::User())
            <a class="botonJugar" href="{{ URL::to('juego') }}">¡Jugar!</a>
            @else
            <a class="botonJugar" href="{{ URL::to('login') }}">¡Jugar!</a>
            @endif
      </div>

</main>


@endsection
