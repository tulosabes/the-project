
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
        <a class="navbar-brand" href=""><img src="{{ asset('images/logoM2.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav col-md-7">

            @yield('navLiIzq')

            <!--<li class="nav-item active">
              <a class="nav-link" href="{{ asset('/admin') }}">empleados <span class="sr-only">(current)</span></a>
            </li>-->
            <!--<li class="nav-item">
              <a class="nav-link" href="{{ asset('/empleados/100') }}">Mostrar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ asset('/empleados/100/edit') }}">Editar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ asset('/empleados/nuevo') }}">Crear</a>
            </li>-->
          </ul>

          <ul class="navbar-nav col-md-5">

            @yield('navLiDer')

            @section('loginRegister')

              <li class="nav-item active"><a href="{{ route('login') }}" class="nav-link">Entrar</a></li>
              <li class="nav-item active"><a href="{{ route('register') }}" class="nav-link">Registrarse</a></li>

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

        <div class="row mt-3">

          <div class="col-12">
                
             @yield('content')

          </div>

          <div class="col-0">

            @section('sidebar')
            
    <!--           <h2>Barra Lateral</h2>-->
            
            @show

          </div>

        </div>

    </main>

    <footer class="footer fixed-bottom bg-dark">
      <div class="container">
        <div class="row">
          
          <div class="col-3">
            
            <p>RP-PADEL</p>

            <p>Avenida Enric Valor, 15 Pol. Ind. La Cala</p>

            <p>03509 Finestrat (Alicante)</p>

          </div>  

          <div class="col-4">
            


          </div>

          <div class="col-4">

            <a href="">Contacto</a>
            
          </div>


        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    
    
</html>