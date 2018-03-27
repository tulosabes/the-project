
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--para los iconos de boostrap-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css">
    <!-- Custom styles for this template 
  
      Con el helper -> "asset('ruta_archivo')" nos dara la ruta absoluta al archivo css, para que lo reconozca

    -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  </head>

  <body>

    <header>

      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{ route('welcome') }}">RP-PADEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav col-md-8">

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

          <ul class="navbar-nav col-md-4">
            
            @yield('navLiDer')

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

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
        <a href="{{ route('admin') }}">Panel de Administración</a>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</html>