

<header>
  <nav>

  <button id="hamburguesa">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </button>

    <ul id="nav" class="row" style="margin-bottom: 0;">
      <a href="{{ URL::to('index') }}" class="offset-3 col-6 col-md-2 offset-md-0"><img class="logo" src="/imgsitio/logoSerialesFB.png" alt="Seriales"></a>

        @if(Auth::User() && Auth::User()->role == 9)
        <button class="admin-button btn btn-outline-secondary" type="button" name="button"><a href="{{ URL::to('administrador') }}">Administrador</a> </button>
        @endif

          <li class="col-12 flex-column flex-md-row col-md-2 menu-items"><a href="{{ URL::to('index') }}">inicio</a></li>
          <li class="col-12 flex-column flex-md-row col-md-2 menu-items"><a href="{{ URL::to('preguntasfrecuentes') }}">preguntas</a></li>
          <li class="col-12 flex-column flex-md-row col-md-2 menu-items">
            @if(Auth::User())
              <a href="{{ URL::to('perfil') }}">mi perfil</a>
              @else
                <a href="{{ route('register') }}">registro</a>
            @endif
            </li>

          <li class="col-12 flex-column flex-md-row col-md-2 menu-items">
            @if(Auth::User())
              <a class="dropdown menu" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              {{ __('Desloguearme') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
              </form>

              @else
                <a href="{{ route('login') }}">login</a>
            @endif
          </li>
          @if(Auth::User())
          <li class="col-12 flex-column flex-md-row col-md-2 menu-items"><a class="play-btn" href="{{ URL::to('juego') }}">jugar</a></li>
          @else
          <li class="col-12 flex-column flex-md-row col-md-2 menu-items"><a class="play-btn" href="{{ route('login') }}">jugar</a></li>
          @endif
    </ul>

      <div class="redessociales" align="right">
        <a href="#"><i class="fab fa-google-play"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-square"></i></a>
        <a href="#"><i class="fab fa-apple"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </nav>

  @if(Auth::User())
    @include('partials.userWelcome')
  @endif
</header>
<script src="/js/header.js"></script>
