@extends('layout') 

@section('title', "Welcome")

@if (Auth::user()->id_rol == 1)

    @section('navLiIzq')
        <li class="nav-item active"><a class="nav-link" href="{{ route('admin') }}">Home</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('club.index') }}">Club</a></li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('empleados.index') }}">Empleados</a>
        </li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('jugadores.index') }}">Jugadores</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('pistas.index') }}">Pistas</a></li>
        <li class="nav-item active"><a class="nav-link" href="">Horarios</a></li>
        <li class="nav-item active"><a class="nav-link" href="">Reservas</a></li>

    @endsection

    @section('navLiDer')

        <li class="nav-item active"><a href="" class="nav-link">Bienvenido {{ Auth::user()->name }}!!!</a></li>

        <li class="nav-item active">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
        </li>

    @endsection

    @section('content')

        <h1>Bienvenido  al panel de Adminstracion</h1>

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
      
        <li class="nav-item active"><a class="nav-link" href="{{ route('admin') }}">Home</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ url('/admin/jugadores') }}">Jugadores</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{ route('pistas.index') }}">Pistas</a></li>
        <li class="nav-item active"><a class="nav-link" href="">Horarios</a></li>
        <li class="nav-item active"><a class="nav-link" href="">Reservas</a></li>

    @endsection

    @section('navLiDer')

        <li class="nav-item active"><a href="" class="nav-link">Bienvenido {{ Auth::user()->name }}!!!</a></li>

        <li class="nav-item active">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
        </li>

    @endsection

    @section('content')

        <h1>Bienvenido  al panel de Adminstracion</h1>

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

    @section('navLiDer')

        <li class="nav-item active">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
        </li>

    @endsection

    @section('content')

        <h1>No tiene acceso a este panel Adminstracion</h1>

        <a href="{{ route('welcome') }}" class="btn btn-warning">Volver</a>


    @endsection

@endif

<!--

    @section('navLiDer')

        <li class="nav-item active">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
            </form>
        </li>

    @endsection

    @section('content')

        <h1>No tiene acceso a este panel Adminstracion</h1>

        <a href="{{ route('welcome') }}" class="btn btn-warning">Volver</a>


    @endsection

-->

