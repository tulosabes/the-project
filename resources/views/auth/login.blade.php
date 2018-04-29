@extends('layout')

@section('title', "Entrar a RP-PADEL")

@section('content')
        <div class="row justify-content-center">
            <div class="card col-sm-12 col-md-8 col-lg-4">
                <div class="card-header">Entrar</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="row">                            

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-sm-12">
                                <label for="email" class="control-label">Correo Electronico</label>

                                
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-sm-12">
                                <label for="password" class="control-label">Contraseña</label>

                                
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                        </label>
                                    </div>
                                </div>
                            </div>    

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="form-group col-sm-12">
                                
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>

                            </div> 

                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('footer')

    <footer class="footer fixed-bottom bg-dark">
        <div class="container">
          
            <div class="row">

                <div class="col-sm-12 col-md-4 text-center">
                    
                    <p><small>{{ $club->name }}</small></p>

                    <p><small>{{ $club->direccion }}</small></p>

                    <p><small>{{ $club->obtenerCPostal() }} {{ $club->obtenerPoblacion() }} {{ $club->obtenerProvincia() }}</small></p>

                </div>

                <div class="col-sm-12 col-md-4 text-center">
                    <p>
                        <small>
                            <a href="">
                                Contacto
                            </a>
                        </small>
                    </p>
                </div>

                <div class="col-sm-12 col-md-4 text-center">

                    <p><small>Copyright © 2018 {{ $club->name }}</small></p>

                    <p><small>Web diseñada por {{ ucwords($admin->name) }} {{ ucwords($admin->apellidos) }}</small></p>

                </div>
                

            </div>

        </div>
      </footer>

@endsection