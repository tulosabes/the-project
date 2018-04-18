@extends('layout') 

@section('title', "Bienvenido a RP-PADEL")

@if (Auth::user()->id_rol == 1)

    @section('navLiIzq')
        <!--<li class="nav-item active"><a class="nav-link" href="{{ route('perfiles.index') }}">Home</a></li>-->
        <li class="nav-item active"><a class="nav-link" href="{{ route('perfiles.index') }}"><span class="oi oi-person"></span> Perfil</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('club.index') }}"><span class="oi oi-home"></span> Club</a></li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('empleados.index') }}"><span class="oi oi-people"></span> Empleados</a>
        </li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('jugadores.index') }}"><span class="oi oi-people"></span> Jugadores</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('pistas.index') }}"><span class="oi oi-loop-square"></span> Pistas</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('horarios.index') }}"><span class="oi oi-clock"></span> Horarios</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('reservas.index') }}"><span class="oi oi-layers"></span> Reservas</a></li>

    @endsection

    @section('navLiDer')

        <li class="nav-item active"><a href="" class="nav-link">Bienvenido {{ Auth::user()->name }}!!!</a></li>

        <li class="nav-item active">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
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

    @endsection

@elseif (Auth::user()->id_rol == 2) 
    
    @section('navLiIzq')
      
        <!--<li class="nav-item active"><a class="nav-link" href="{{ route('perfiles.index') }}">Home</a></li>-->
        <li class="nav-item active"><a class="nav-link" href="{{ route('perfiles.index') }}"><span class="oi oi-person"></span> Perfil</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('jugadores.index') }}"><span class="oi oi-person"></span> Jugadores</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('pistas.index') }}"><span class="oi oi-loop-square"></span> Pistas</a></li>
        <!--<li class="nav-item active"><a class="nav-link" href="{{ route('horarios.index') }}">Horarios</a></li>-->
        <li class="nav-item active"><a class="nav-link" href="{{ route('reservas.index') }}"><span class="oi oi-layers"></span> Reservas</a></li>

    @endsection

    @section('navLiDer')

        <li class="nav-item active"><a href="" class="nav-link">Bienvenido {{ Auth::user()->name }}!!!</a></li>

        <li class="nav-item active">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
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

    @endsection

@else

    
    
@endif



