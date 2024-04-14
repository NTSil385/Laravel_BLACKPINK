<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="home/images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Healet</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="home/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="home/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="home/css/responsive.css" rel="stylesheet" />

  

</head>

<body>

  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.html">
          <span>
            Healet
          </span>
        </a>
        <div class="" id="">

          <div class="custom_menu-btn">
            <button onclick="openNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="http://127.0.0.1:8000/">Home</a>
                <a href="about.html">About</a>
                <a href="http://127.0.0.1:8000/shopping">Shop</a>
                 @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           
                                <a  href="#">
                                    {{ Auth::user()->name }}
                                </a>

                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                        
                        @endguest
                       
              </div>
            </div>
          </div>

        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->

    @yield('content')
    @yield('scripts')
  <!-- shop section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->


  <!-- jQery -->
  <script src="home/js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="home/js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="home/js/custom.js"></script>

</body>

</html>