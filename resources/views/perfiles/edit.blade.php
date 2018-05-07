@extends('admin') 

@section('title', "Editar administrador $admin->name")

@section('script');
	<script src="{{ asset('js/scriptPerfil.js') }}"></script> 
@endsection

@section('content')

<div class="row justify-content-center"> 
	<div class="card col-sm-12 col-md-8">
		
		<h4 class="card-header letraColor">
			Editar administrador {{ $admin->name }}
		</h4>

		<div class="card-body">
			
			<form role='form' method="POST" action='{{ url("admin/perfil/{$admin->id}") }}'>

				{{ method_field('PUT') }} <!--campo oculto para decirle que estamos enviando por PUT y no por post-->

				{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)

				Genera un campo oculto que contiene el token para pasar la proteccion contra ataques de tipo CSRF que provee Laravel por defecto
				-->

				
				<div class="row">
					
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
					
						<label for="name" class="control-label">Nombre:</label>
						<input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name', $admin->name) }}">

						@if ($errors->has('name'))

							<div class="alert alert-danger">{{ $errors->first('name') }}</div>

						@endif

					</div>

					<div class="form-group col-sm-12 col-md-6 col-lg-4">
						
						<label for="apellidos" class="control-label">Apellidos:</label>
						<input type="text" name="apellidos" id="apellidos" placeholder="Garcia Garcia" class="form-control" value="{{ old('apellidos', $admin->apellidos) }}">

						@if ($errors->has('apellidos'))

							<div class="alert alert-danger">{{ $errors->first('apellidos') }}</div>

						@endif

					</div>

				</div>

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
					
						<label for="documento" class="control-label">Tipo de documento:</label>
                        <select id="documento" name="documento" class="form-control">
                            
                            <option value="sin">Sin documento</option>  
                            <option value="nif">DNI</option>
                            <option value="nie">NIE</option>                          

                        </select>


						<input type="text" name="dni" id="dni" placeholder="48300300w" class="form-control"  value="{{ old('dni', $admin->dni) }}">

						@if ($errors->has('dni'))

							<div class="alert alert-danger">{{ $errors->first('dni') }}</div>

						@endif

						<input type="text" name="nif" id="nif" placeholder="x8300300w" class="form-control"  value="{{ old('nif', $admin->nif) }}">

						@if ($errors->has('nif'))

							<div class="alert alert-danger">{{ $errors->first('nif') }}</div>

						@endif

					</div>

				</div>

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-12 col-lg-6">
					
						<label for="email" class="control-label">Correo electrónico:</label>
						<input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" class="form-control" value="{{ old('email' , $admin->email) }}"><!-- en value le ponemos el metodo old('nombre_campo') con esto hacemos que se guarde el valor en caso de tener errores en los demas campos-->

						@if ($errors->has('email'))

							<div class="alert alert-danger">{{ $errors->first('email') }}</div>

						@endif

					</div>

					<div class="form-group col-sm-12 col-md-12 col-lg-6">
                        
                        <label for="email-confirm" class="control-label">Confirmar email:</label>
                        <input id="email-confirm" type="email" placeholder="" class="form-control" name="email_confirmation"  value="{{ old('email-confirm' , $admin->email) }}">
                
                        @if ($errors->has('email-confirm'))

                            <div class="alert alert-danger">{{ $errors->first('email-confirm') }}</div>

                        @endif

                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-4">
						
						<label for="telefono" class="control-label">Teléfono:</label>
						<input type="text" name="telefono" id="telefono" placeholder="666777888" class="form-control"  value="{{ old('telefono', $admin->telefono) }}">

						@if ($errors->has('telefono'))

							<div class="alert alert-danger">{{ $errors->first('telefono') }}</div>

						@endif

					</div>

				</div>	

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
					
						<label for="nivel" class="control-label">Nivel:</label>

						<select name="niveles" id="niveles" class="form-control">

							@foreach ($niveles as $nivel)

								@if ($admin->id_nivel === $nivel->id)

									<option value="{{ $nivel->id }}" selected="selected">{{ $nivel['nivel'] }}</option>

								@else

									<option value="{{ $nivel->id }}">{{ $nivel['nivel'] }}</option>

								@endif

							@endforeach

						</select>

						@if ($errors->has('niveles'))

							<div class="alert alert-danger">{{ $errors->first('niveles') }}</div>

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
                            
                            <option value="0" id="optionProvincia">Elija una provincia</option>

                            @foreach($provincias as $pro)

								@if ($admin->id_provincia === $pro->id)

									<option value="{{ $pro->id }}" selected="selected">{{ $pro->provincia }}</option>

								@else

									<option value="{{ $pro->id }}">{{ $pro->provincia }}</option>

								@endif

                            @endforeach

                        </select>

                        @if ($errors->has('provincia'))

                            <div class="alert alert-danger">{{ $errors->first('provincia') }}</div>

                        @endif


                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        
                        <label for="poblacion" class="control-label">Población:</label>
                        <select name="poblacion" id="poblacion" class="form-control">
                            
                            <option value="0" id="optionPoblacion">Elija una poblacion</option>

                            @foreach ($poblaciones as $poblacion)

								@if ($admin->id_poblacion === $poblacion->id)

									<option value="{{ $poblacion->id }}" selected="selected">{{ $poblacion->poblacion }}</option>

								@else

									<option value="{{ $poblacion->id }}">{{ $poblacion->poblacion }}</option>

								@endif

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
						<input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres" class="form-control">

						@if ($errors->has('password'))

							<div class="alert alert-danger">{{ $errors->first('password') }}</div>

						@endif

					</div>

					<div class="form-group col-sm-12 col-md-6 col-lg-4">
                        
                        <label for="password-confirm" class="control-label">Confirmar contraseña:</label>
                        <input id="password-confirm" type="password" placeholder="Mayor a 6 carácteres" class="form-control" name="password_confirmation value="{{ old('email-confirm') }}"">
                        
                        @if ($errors->has('password-confirm'))

                            <div class="alert alert-danger">{{ $errors->first('password-confirm') }}</div>

                        @endif

                    </div>

				</div>

				<div class="row">
					
					<div class="form-group ">

						<button type="submit" class="btn btn-primary">Actualizar administrador</button>
						<a href="{{ route('perfiles.index') }}" class="btn btn-warning">Volver</a>

					</div>

				</div>

			</form>

		</div>

	</div>
</div>
@endsection