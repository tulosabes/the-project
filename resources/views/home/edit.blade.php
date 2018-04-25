@extends('home') 

@section('title', "Editar jugador $jugador->name")

@section('content')

	<div class="card">
		
		<h4 class="card-header">
			Editar jugador {{ $jugador->name }}
		</h4>

		<div class="card-body">
			
			<form role='form' method="POST" action='{{ url("home/perfil/{$jugador->id}") }}'>

				{{ method_field('PUT') }} <!--campo oculto para decirle que estamos enviando por PUT y no por post-->

				{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)

				Genera un campo oculto que contiene el token para pasar la proteccion contra ataques de tipo CSRF que provee Laravel por defecto
				-->

				
				<div class="form-group">
					
					<label for="name" class="control-label">Nombre:</label>
					<input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name', $jugador->name) }}">

					@if ($errors->has('name'))

						<div class="alert alert-danger">{{ $errors->first('name') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="apellidos" class="control-label">Apellidos:</label>
					<input type="text" name="apellidos" id="apellidos" placeholder="Garcia Garcia" class="form-control" value="{{ old('apellidos', $jugador->apellidos) }}">

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


					<input type="text" name="dni" id="dni" placeholder="48300300w" class="form-control"  value="{{ old('dni', $jugador->dni) }}">

					@if ($errors->has('dni'))

						<div class="alert alert-danger">{{ $errors->first('dni') }}</div>

					@endif

					<input type="text" name="nif" id="nif" placeholder="x8300300w" class="form-control"  value="{{ old('nif', $jugador->nif) }}">

					@if ($errors->has('nif'))

						<div class="alert alert-danger">{{ $errors->first('nif') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="email" class="control-label">Correo electrónico:</label>
					<input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" class="form-control" value="{{ old('email' , $jugador->email) }}"><!-- en value le ponemos el metodo old('nombre_campo') con esto hacemos que se guarde el valor en caso de tener errores en los demas campos-->

					@if ($errors->has('email'))

						<div class="alert alert-danger">{{ $errors->first('email') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="telefono" class="control-label">Telefono:</label>
					<input type="text" name="telefono" id="telefono" placeholder="666777888" class="form-control"  value="{{ old('telefono', $jugador->telefono) }}">

					@if ($errors->has('telefono'))

						<div class="alert alert-danger">{{ $errors->first('telefono') }}</div>

					@endif

				</div>	

				<div class="form-group">
					
					<label for="nivel" class="control-label">Nivel:</label>

					<select name="niveles" id="niveles" class="form-control">

						@foreach ($niveles as $nivel)

							@if ($jugador->id_nivel === $nivel->id)

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

				<div class="form-group">
					
					<label for="direccion" class="control-label">Direccion:</label>
					<input type="text" name="direccion" id="direccion" placeholder="" class="form-control" value="{{ old('direccion', $jugador->direccion) }}">

					@if ($errors->has('direccion'))

						<div class="alert alert-danger">{{ $errors->first('direccion') }}</div>

					@endif

				</div>

				<div class="from-group">
                    
                    <label for="provincia" class="control-label">Provincia:</label>
                    <select name="provincia" id="provincia" class="form-control">
                        
                        @foreach($provincias as $pro)

                        	

                            @if ($jugador->id_provincia === $pro->id)

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

                <div class="from-group">
                    
                    <label for="poblacion" class="control-label">Poblacion:</label>
                    <select name="poblacion" id="poblacion" class="form-control">
                        
                        @foreach ($poblaciones as $poblacion)


                            @if ($jugador->id_poblacion === $poblacion->id)

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

				<div class="form-group">
					
					<label for="password" class="control-label">Contraseña:</label>
					<input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres" class="form-control">

					@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif

				</div>

				<button type="submit" class="btn btn-primary">Actualizar jugador</button>
				<a href="{{ route('home.index') }}" class="btn btn-warning">Volver</a>

			</form>

		</div>

	</div>

@endsection