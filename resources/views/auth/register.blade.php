@extends('layout')

@section('title', "Resgistro para RP-PADEL")

@section('content')

    <div class="row justify-content-center">    
    <div class="card col-sm-12 col-md-8 ">
        <div class="card-header">Registro</div>

        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                 {{ csrf_field() }}

                        
                <div class="row">
                    
                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
                    
                        <label for="name" class="control-label">Nombre:</label>
                        <input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name') }}">

                        @if ($errors->has('name'))

                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>

                        @endif

                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
                        
                        <label for="apellidos" class="control-label">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" placeholder="Garcia Garcia" class="form-control" value="{{ old('apellidos') }}">

                        @if ($errors->has('apellidos'))

                            <div class="alert alert-danger">{{ $errors->first('apellidos') }}</div>

                        @endif

                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
                        
                        <label for="dnis" class="control-label">Tipo de documento:</label>
                        <select id="dnis" name="dnis" class="form-control">
                            
                            <option value="sin">Sin documento</option>  
                            <option value="nif">NIF</option>
                            <option value="nie">NIE</option>                          

                        </select>


                        <input type="text" name="dni" id="dni" placeholder="48300300w" class="form-control"  value="{{ old('dni') }}">

                        @if ($errors->has('dni'))

                            <div class="alert alert-danger">{{ $errors->first('dni') }}</div>

                        @endif

                        <input type="text" name="nif" id="nif" placeholder="x8300300w" class="form-control"  value="{{ old('nif') }}">

                        @if ($errors->has('nif'))

                            <div class="alert alert-danger">{{ $errors->first('nif') }}</div>

                        @endif

                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
                        
                        <label for="fecha_nacimiento" class="control-label">Fecha de nacimiento;</label>
                        <span class="badge badge-danger">(Mayores de 14 años)</span>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', date('d-m-Y')) }}" max="{{ $date->now()->subYears(14)->formatLocalized('%Y-%m-%d') }}">
                        
                    </div>
                    
                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
                    
                        <div class="form-group col-sm-12 col-md-12 col-lg-4">

                            <input type="radio" name="sexo" class="form-check-input" value="hombre" id="hombre">                    
                            <label for="hombre" class="form-check-label">Hombre</label>
                            
                             @if ($errors->has('sexo'))

                                <div class="alert alert-danger">{{ $errors->first('sexo') }}</div>

                            @endif

                        </div> 

                        <div class="form-group col-sm-12 col-md-12 col-lg-4">
                            
                            <input type="radio" name="sexo" class="form-check-input" value="mujer" id="mujer">                    
                            <label for="mujer" class="form-check-label">Mujer</label>
                
                             @if ($errors->has('sexo'))

                                <div class="alert alert-danger">{{ $errors->first('sexo') }}</div>

                            @endif

                        </div>

                    </div>

                </div>

                <div class="row">
                    
                    <div class="form-group col-sm-12 col-md-12 col-lg-6">
                    
                        <label for="email" class="control-label">Correo electrónico:</label>
                        <input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" class="form-control" value="{{ old('email') }}"> 

                        @if ($errors->has('email'))

                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>

                        @endif

                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-6">
                        
                        <label for="email-confirm" class="control-label">Confirmar email:</label>
                        <input id="email-confirm" type="email" placeholder="" class="form-control" name="email_confirmation">
                
                        @if ($errors->has('email-confirm'))

                            <div class="alert alert-danger">{{ $errors->first('email-confirm') }}</div>

                        @endif

                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
                        
                        <label for="telefono" class="control-label">Teléfono:</label>
                        <input type="text" name="telefono" id="telefono" placeholder="666777888" class="form-control"  value="{{ old('telefono') }}">

                        @if ($errors->has('telefono'))

                            <div class="alert alert-danger">{{ $errors->first('telefono') }}</div>

                        @endif

                    </div>

                </div>
        
                <div class="row">
                    
                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
                    
                        <label for="direccion" class="control-label">Dirección:</label>
                        <input type="text" name="direccion" id="direccion" placeholder="" class="form-control" value="{{ old('direccion') }}">

                        @if ($errors->has('direccion'))

                            <div class="alert alert-danger">{{ $errors->first('direccion') }}</div>

                        @endif

                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        
                        <label for="provincia" class="control-label">Provincia:</label>
                        <select name="provincia" id="provincia" class="form-control">
                            
                            <option value="">Elija una provincia</option>

                            @foreach($provincias as $pro)

                                    <option value="{{ $pro->id }}">{{ $pro->provincia }}</option>

                            @endforeach

                        </select>

                        @if ($errors->has('provincia'))

                            <div class="alert alert-danger">{{ $errors->first('provincia') }}</div>

                        @endif


                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        
                        <label for="poblacion" class="control-label">Población:</label>
                        <select name="poblacion" id="poblacion" class="form-control">
                            
                            <option value="">Elija una poblacion</option>

                            @foreach ($poblaciones as $poblacion)

                                <option value="{{ $poblacion->id }}">{{ $poblacion->poblacion }}</option>

                            @endforeach


                        </select>

                        @if ($errors->has('poblacion'))

                            <div class="alert alert-danger">{{ $errors->first('poblacion') }}</div>

                        @endif


                    </div>

                </div>

                <div class="row">
                    
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    
                        <label for="password" class="control-label">Contraseña:</label>
                        <input type="password" name="password" id="password" placeholder="Mayor a 6 carácteres" class="form-control">

                        @if ($errors->has('password'))

                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>

                        @endif

                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        
                        <label for="password-confirm" class="control-label">Confirmar contraseña:</label>
                        <input id="password-confirm" type="password" placeholder="Mayor a 6 carácteres" class="form-control" name="password_confirmation">
                        
                        @if ($errors->has('password-confirm'))

                            <div class="alert alert-danger">{{ $errors->first('password-confirm') }}</div>

                        @endif

                    </div>

                </div>

                <div class="row">
                    
                    <div class="form-group col-sm-12">
                    
                        <div class="form-check">
                            
                            <input type="checkbox" name="condiciones" class="form-check-input" value="ok" id="condiciones">                    
                            <label for="condiciones" class="form-check-label">He leído y acepto la <a href="">politica de privacidad</a></label>
                
                             @if ($errors->has('condiciones'))

                                <div class="alert alert-danger">{{ $errors->first('condiciones') }}</div>

                            @endif

                        </div>

                    </div> 

                </div>         

                <div class="row">
                    
                    <div class="form-group">
                    
                        <div class="col-md-6 col-md-offset-4">
                        
                            <button type="submit" class="btn btn-primary">
                        
                                Registrarse
                        
                            </button>
                        
                        </div>
                
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
                    
                <small>{{ $club->name }}</small><br>

                <small>{{ $club->direccion }}</small><br>

                <small>{{ $club->obtenerCPostal() }} {{ $club->obtenerPoblacion() }} {{ $club->obtenerProvincia() }}</small><br>  

                </div>

                <div class="col-sm-12 col-md-4 text-center">
                    <p class="mt-3">
                        <a href="">
                            <small>Contacto</small>
                        </a>
                    </p>
                </div>

                <div class="col-sm-12 col-md-4 text-center">

                    <small>Copyright © 2018 {{ $club->name }}</small><br>

                    <small>Web diseñada por {{ ucwords($admin->name) }} {{ ucwords($admin->apellidos) }}</small>

                </div>
                

            </div>

        </div>
      </footer>

@endsection