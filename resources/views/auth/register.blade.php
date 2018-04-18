@extends('layout')

@section('title', "Resgistro para RP-PADEL")

@section('content')

    <div class="card">
        <div class="card-header">Registro</div>

        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                 {{ csrf_field() }}

                        

                <div class="form-group">
                    
                    <label for="name" class="control-label">Nombre:</label>
                    <input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name') }}">

                    @if ($errors->has('name'))

                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>

                    @endif

                </div>

                <div class="form-group">
                    
                    <label for="apellidos" class="control-label">Apellidos:</label>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Garcia Garcia" class="form-control" value="{{ old('apellidos') }}">

                    @if ($errors->has('apellidos'))

                        <div class="alert alert-danger">{{ $errors->first('apellidos') }}</div>

                    @endif

                </div>

                <div class="form-group">
                    
                    <label for="dnis" class="control-label">Dni:</label>
                    <select id="dnis" name="dnis" class="form-control">
                        
                        <option value="nifs">NIF</option>
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

                <div class="form-group">
                    
                    <label for="email" class="control-label">Correo electrónico:</label>
                    <input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" class="form-control" value="{{ old('email') }}"><!-- en value le ponemos el metodo old('nombre_campo') con esto hacemos que se guarde el valor en caso de tener errores en los demas campos-->

                    @if ($errors->has('email'))

                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>

                    @endif

                </div>

                <div class="form-group">
                    
                    <label for="telefono" class="control-label">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" placeholder="666777888" class="form-control"  value="{{ old('telefono') }}">

                    @if ($errors->has('telefono'))

                        <div class="alert alert-danger">{{ $errors->first('telefono') }}</div>

                    @endif

                </div>

                <div class="form-group">
                    
                    <div class="form-check">

                        <input type="radio" name="sexo" class="form-check-input" value="hombre" id="hombre">                    
                        <label for="hombre" class="form-check-label">Hombre</label>
                        
                         @if ($errors->has('sexo'))

                            <div class="alert alert-danger">{{ $errors->first('sexo') }}</div>

                        @endif

                    </div> 

                    <div class="form-check">
                        
                        <input type="radio" name="sexo" class="form-check-input" value="mujer" id="mujer">                    
                        <label for="mujer" class="form-check-label">Mujer</label>
            
                         @if ($errors->has('sexo'))

                            <div class="alert alert-danger">{{ $errors->first('sexo') }}</div>

                        @endif

                    </div>

                </div>
        
                <div class="form-group">
                    
                    <label for="direccion" class="control-label">Direccion:</label>
                    <input type="text" name="direccion" id="direccion" placeholder="" class="form-control" value="{{ old('direccion') }}">

                    @if ($errors->has('direccion'))

                        <div class="alert alert-danger">{{ $errors->first('direccion') }}</div>

                    @endif

                </div>

                <div class="form-group">
                    
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

                <div class="form-group">
                    
                    <label for="poblacion" class="control-label">Poblacion:</label>
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

                <div class="form-group">
                    
                    <label for="password" class="control-label">Contraseña:</label>
                    <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres" class="form-control">

                    @if ($errors->has('password'))

                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>

                    @endif

                </div>

                <div class="form-group">
                    
                    <label for="password-confirm" class="control-label">Confirmar contraseña</label>
                    <input id="password-confirm" type="password" placeholder="Mayor a 6 caracteres" class="form-control" name="password_confirmation" required>
            
                </div>

                <div class="form-group">
                    
                    <div class="form-check">
                        
                        <input type="checkbox" name="condiciones" class="form-check-input" value="" id="condiciones">                    
                        <label for="condiciones" class="form-check-label">He leído y acepto la <a href="">politica de privacidad</a></label>
            
                         @if ($errors->has('condiciones'))

                            <div class="alert alert-danger">{{ $errors->first('condiciones') }}</div>

                        @endif

                    </div>

                </div>          

                <div></div>

                <div class="form-group">
                    
                    <div class="col-md-6 col-md-offset-4">
                    
                        <button type="submit" class="btn btn-primary">
                    
                            Registrarse
                    
                        </button>
                    
                    </div>
            
                </div>
           
            </form>
         </div>
    </div>

@endsection