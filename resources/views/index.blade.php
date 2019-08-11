@include('layouts/master')

@section('content')

<!DOCTYPE html>
<html lang="es" dir="ltr">

<body>
  <div id="carouselSeries" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="5000">
        <img src="/imgsitio/gameOfThrones.png" class="d-block w-100" alt="GOT">
      </div>
      <div class="carousel-item" data-interval="5000">
        <img src="/imgsitio/orangeIsTheNewBlack.png" class="d-block w-100" alt="OITNB">
      </div>
      <div class="carousel-item" data-interval="5000">
        <img src="/imgsitio/Seinfeld.png" class="d-block w-100" alt="Seinfeld">
      </div>
      <div class="carousel-item" data-interval="5000">
        <img src="/imgsitio/theWalkingDead.png" class="d-block w-100" alt="TWD">
      </div>
      <div class="carousel-item" data-interval="5000">
        <img src="/imgsitio/Vikings.png" class="d-block w-100" alt="Wikings">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</body>

@endsection
