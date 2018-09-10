<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <title>Midgard</title>

  </head>
  <body>
  @guest
  @else

    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{ url('/home') }}"><img src="{{ asset('/img/Banner.png') }}" alt="Midgard" class="menuIcon"/></a>
          </li>
          <li class="nav-item">
            @if(Auth::user()->hasRole('master'))
              <a href="{{ url('/play/master') }}"><img src="{{ asset('/img/IconDice.png') }}" alt="Spielen" class="menuIcon"/></a>
            @elseif(Auth::user()->hasRole('player'))
              <a href="{{ url('/play') }}"><img src="{{ asset('/img/IconDice.png') }}" alt="Spielen" class="menuIcon"/></a>
            @endif
          </li>
          @if(Auth::user()->hasRole('player'))
          <li class="nav-item">
            <a href="{{ url('/character') }}"><img src="{{ asset('/img/IconCharacter.png') }}" alt="Charakter" class="menuIcon"/></a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ url('/group') }}"><img src="{{ asset('/img/IconGroup.png') }}" alt="Gruppe" class="menuIcon"/></a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/rules') }}"><img src="{{ asset('/img/IconRules.png') }}" alt="Gruppe" class="menuIcon"/></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto" >
          <li>
            <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <img src="{{ asset('/img/IconLogout.png') }}" alt="Midgard" class="menuIcon"/>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
          <li class="nav-item dropdown">
              <a id="navbarDropdown" style="color: #4d3328; font-size: 20pt; margin-top:50%;" class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <ul>
                  <li class="navDropdown">
                    <a href="{{ url('/profile/name') }}"> Profilname ändern</a>
                  </li>
                  <li class="navDropdown">
                    <a href="{{ url('/profile/password') }}">Passwort ändern</a>
                  </li>
                  <ul>
              </div>
          </li>
        </ul>
      </nav>
    </div>
    @endguest

    <div class="container">
    @include('inc.messages')
    @yield('content')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>