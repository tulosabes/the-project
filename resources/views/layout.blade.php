
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

    <script src="{{ asset('plugin/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugin/bootstrap-4/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/scriptLogout.js') }}"></script> 

    <!-- MI SCRIPT -->
    @yield('script')

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

            @section('nav')
              <li class="nav-item active">
                  <a class="nav-link" href="{{ route('welcome') }}"><span class="oi oi-home"></span> Home <span class="sr-only">(current)</span></a>
                </li>
            
    
                <li class="nav-item dropdown bg-dark">
                
                    <a class="nav-link dropdown-toggle" data-toggle='dropdown' href=""><span class="oi oi-target"></span> Club</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href=""><span class="oi oi-info"></span> Servicios</a>
                        <a class="dropdown-item" href=""><span class="oi oi-layers"></span> Reservas</a>                
                    </div>
        
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" href=""><span class="oi oi-phone"></span> Contacto</a>
                </li>
              </ul>
            @show


            @yield('navLiIzq')
           <!-- <li class="nav-item active">
              <a class="nav-link" href="{{ route('welcome') }}"><span class="oi oi-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
           <li class="nav-item ">
              <a class="nav-link" href=""><span class="oi oi-home"></span> Club</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=""><span class="oi oi-service"></span> Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=""><span class="oi oi-layers"></span> Reservas</a>
            </li>

            <li class="nav-item dropdown bg-dark">
            
                <a class="nav-link dropdown-toggle" data-toggle='dropdown' href=""><span class="oi oi-target"></span> Club</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href=""><span class="oi oi-info"></span> Servicios</a>
                    <a class="dropdown-item" href=""><span class="oi oi-layers"></span> Reservas</a>                
                </div>
    
            </li>

            <li class="nav-item">
              <a class="nav-link" href=""><span class="oi oi-phone"></span> Contacto</a>
            </li>-->
          </ul>

          <ul class="navbar-nav col-md-4">

            @yield('navLiDer')

            @section('loginRegister')

              <li class="nav-item  ml-auto"><a href="{{ route('login') }}" class="nav-link" class="iconic-md"><span class="oi oi-account-login"></span> Entrar</a></li>
              <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><span class="oi oi-aperture"></span> Registrarse</a></li>

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


        <div class="row mr-1 ml-1">

          <div class="col">
                
             @yield('content')

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                  <div class="modal-header">
                    <h5 class="modal-title text-default letraColor" id="exampleModalLongTitle">Salir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body letraColor">
                    <p>¿Esta seguro que desea salir de su cuenta de usuario?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Seguir conectado</button>
                    <a href="{{ route('logout') }}" class="nav-link btn btn-danger" id="logout"><span class="oi oi-account-logout"></span> Salir</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </div>
              </div>
            </div>

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
    
  </body>
</html>