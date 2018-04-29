
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon-96x96.png') }}">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap-4/css/bootstrap.css') }}">

    <script src="../../plugin/jquery/jquery.js"></script>
    <script src="{{ asset('plugin/bootstrap-4/js/bootstrap.js') }}"></script>

    <!--para los iconos de boostrap-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css">
    <!-- Custom styles for this template 
  
      Con el helper -> "asset('ruta_archivo')" nos dara la ruta absoluta al archivo css, para que lo reconozca

    -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    
  </head>

  <body>

    <div class="row"><img src="{{ asset('images/logo.jpg') }}"></img></div>

    <header>

      
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href=""><img src="{{ asset('images/logoM2.png') }}" class="img-fluid"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav col-md-8">

            @yield('navLiIzq')

            <li class="nav-item active">
              <a class="nav-link" href="">Club <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Reservas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Contacto</a>
            </li>
          </ul>

          <ul class="navbar-nav col-md-4">

            @yield('navLiDer')

            @section('loginRegister')

              <li class="nav-item  ml-auto"><a href="{{ route('login') }}" class="nav-link">Entrar</a></li>
              <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registrarse</a></li>

            @show

          </ul>
          <!--<form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>-->
        </div>
      </nav>
    
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">

        <!-- la directiva "yield('content') lo que hace "-->

        <div class="row mr-1 ml-1">

          <div class="col">
                
             @yield('content')

          </div>

          <!--<div class="col-0">

            @section('sidebar')
            
              <h2>Barra Lateral</h2>
            
            @show

          </div>-->

        </div>

    </main>

    @section('footer')
      
    @show
    
    
</html>