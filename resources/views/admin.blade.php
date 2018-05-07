@extends('layout') 

@section('title', "Bienvenido a RP-PADEL")

@section('script');
    <script src="{{ asset('js/scriptLogout.js') }}"></script> 
@endsection

@if (Auth::user()->id_rol == 1)

    @section('nav')
    @stop

    @section('navLiIzq')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin') }}">
                <span class="oi oi-home"></span> 
                Home 
                <span class="sr-only">(current)</span>
            </a>
        </li>
    
        <li class="nav-item dropdown bg-dark">
            <a class="nav-link dropdown-toggle" data-toggle='dropdown' href=""><span class="oi oi-target"></span> Club</a>    
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('club.index') }}"><span class="oi oi-info"></span> Club</a>
                <a class="dropdown-item" href="{{ route('pistas.index') }}"><span class="oi oi-loop-square"></span> Pistas</a>
                <a class="dropdown-item" href="{{ route('horarios.index') }}"><span class="oi oi-clock"></span> Horarios</a>
                <a class="dropdown-item" href="{{ route('reservas.index') }}"><span class="oi oi-layers"></span> Reservas</a>
            </div>
        </li>

        <li class="nav-item dropdown bg-dark">
            <a class="nav-link dropdown-toggle" data-toggle='dropdown' href=""><span class="oi oi-people"></span> Usuarios</a>    
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('perfiles.index') }}"><span class="oi oi-person"></span> Mi perfil</a>
                <a class="dropdown-item" href="{{ route('empleados.index') }}"><span class="oi oi-people"></span> Empleados</a>
                <a class="dropdown-item" href="{{ route('jugadores.index') }}"><span class="oi oi-people"></span> Jugadores</a>
            </div>
        </li>

       <!-- 
        <li class="nav-item"><a class="nav-link" href="{{ route('admin') }}"><span class="oi oi-home"></span> Home <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('perfiles.index') }}"><span class="oi oi-person"></span> Perfil</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('club.index') }}"><span class="oi oi-target"></span> Club</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('empleados.index') }}"><span class="oi oi-people"></span> Empleados</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('jugadores.index') }}"><span class="oi oi-people"></span> Jugadores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pistas.index') }}"><span class="oi oi-loop-square"></span> Pistas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('horarios.index') }}"><span class="oi oi-clock"></span> Horarios</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('reservas.index') }}"><span class="oi oi-layers"></span> Reservas</a></li>
        -->

    @endsection

    @section('navLiDer')

        <li class="nav-item ml-auto"><a href="{{ route('perfiles.index') }}" class="nav-link">Bienvenido {{ ucwords(Auth::user()->name) }}!!!</a></li>

        <li class="nav-item">
            <a class="nav-link btn btn-outline-danger"  data-toggle="modal" data-target="#exampleModalCenter"><span class="oi oi-account-logout"></span> Salir</a>

            
        </li>

        @section('loginRegister')
        @stop

    @endsection

    @section('content')

        <h1>Bienvenido  al panel de Adminstracion del Administrados</h1>

        <div class="panel panel-default">
            <div class="panel-heading"></div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title text-default" id="exampleModalLongTitle">Salir</h5>
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

    @endsection

    @section('footer')
    @stop


@elseif (Auth::user()->id_rol == 2) 

    @section('nav')
    @stop

    @section('navLiIzq')

        <li class="nav-item active"><a class="nav-link" href="{{ route('admin') }}"><span class="oi oi-home"></span> Home <span class="sr-only">(current)</span></a></li>
            
        <li class="nav-item dropdown bg-dark">
            <a class="nav-link dropdown-toggle" data-toggle='dropdown' href=""><span class="oi oi-target"></span> Club</a>    
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('pistas.index') }}"><span class="oi oi-loop-square"></span> Pistas</a>
                <a class="dropdown-item" href="{{ route('reservas.index') }}"><span class="oi oi-layers"></span> Reservas</a>
            </div>
        </li>
    
        <li class="nav-item dropdown bg-dark">
            <a class="nav-link dropdown-toggle" data-toggle='dropdown' href=""><span class="oi oi-people"></span> Usuarios</a>    
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('perfiles.index') }}"><span class="oi oi-person"></span> Mi perfil</a>
                <a class="dropdown-item" href="{{ route('jugadores.index') }}"><span class="oi oi-people"></span> Jugadores</a>
            </div>
        </li>
      
        <!--<li class="nav-item"><a class="nav-link" href="{{ route('admin') }}"><span class="oi oi-home"></span> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('perfiles.index') }}"><span class="oi oi-person"></span> Perfil</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('jugadores.index') }}"><span class="oi oi-person"></span> Jugadores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pistas.index') }}"><span class="oi oi-loop-square"></span> Pistas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('horarios.index') }}">Horarios</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('reservas.index') }}"><span class="oi oi-layers"></span> Reservas</a></li>-->

    @endsection

    @section('navLiDer')

        <li class="nav-item ml-auto"><a href="{{ route('perfiles.index') }}" class="nav-link">Bienvenido {{ ucwords(Auth::user()->name) }}!!!</a></li>

        <li class="nav-item">
            <a class="nav-link btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter"><span class="oi oi-account-logout"></span> Salir</a>

        </li>

        @section('loginRegister')
        @stop

    @endsection

    @section('content')

        <h1>Bienvenido  al panel de Adminstracion del empleado</h1>

        <div class="panel panel-default">
            <div class="panel-heading"></div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

                <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title text-default" id="exampleModalLongTitle">Salir</h5>
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

    @endsection

    @section('footer')
    @stop

@else

    
    
@endif



