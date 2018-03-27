@extends('admin') 

@section('title', "Crear empleados")

@section('content')

	<div class="card">
		
		<h4 class="card-header">
			Crear empleado
		</h4>

		<!--@if ($errors->any()) any() devuleve verdadero y hay alguno error y false si no lo hay
							
							comentarios de blade "{-..-}"
							-

			<div class="alert alert-danger">
				
				<ul>
				
					@foreach ($errors->all() as $error)

						<li>{{ $error }}</li>

					@endforeach

				</ul>

			</div>

		@endif-->

		<div class="card-body">
			
			<form method="POST" action="{{ route('empleados.store') }}" role='form'>

				{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)

				Genera un campo oculto que contiene el token para pasar la proteccion contra ataques de tipo CSRF que provee Laravel por defecto
				-->

				<div class="form-group">
					
					<label for="name" class="control-label">Nombre:</label>
					<input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name') }}">

					@if ($errors->has('name'))

						<div class="alert alert-danger">{{ $errors->first('name') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="apellidos" class="control-label">Apellidos:</label>
					<input type="text" name="apellidos" id="apellidos" placeholder="Garcia Garcia" class="form-control">

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="dni" class="control-label">Dni:</label>
					<input type="text" name="dni" id="dni" placeholder="48300300w" class="form-control"  value="{{ old('dni') }}">

					@if ($errors->has('dni'))

						<div class="alert alert-danger">{{ $errors->first('dni') }}</div>

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
					
					<label for="nivel" class="control-label">Nivel:</label>

					<select name="niveles" id="niveles" class="form-control">

						<option value="">Elija el nivel del jugador</option>
						
						@foreach ($niveles as $nivel)

							<option value="{{ $nivel->id }}">{{ $nivel['nivel'] }}</option>

						@endforeach

					</select>

					@if ($errors->has('niveles'))

						<div class="alert alert-danger">{{ $errors->first('niveles') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="direccion" class="control-label">Direccion:</label>
					<input type="text" name="direccion" id="direccion" placeholder="" class="form-control">

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="poblacion" class="control-label">Poblacion:</label>
					<input type="text" name="poblacion" id="poblacion" placeholder="Benidorm" class="form-control">

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="provincia" class="control-label">Provincia:</label>
					<input type="text" name="provincia" id="provincia" placeholder="Alicante" class="form-control">

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="c_postal" class="control-label">Código postal:</label>
					<input type="text" name="c_postal" id="c_postal" placeholder="03500" class="form-control">

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="password" class="control-label">Contraseña:</label>
					<input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres" class="form-control">

					@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif

				</div>

				<button type="submit" class="btn btn-success">Crear empleado</button>
				<a href="{{ route('empleados.index') }}" class="btn btn-warning">Volver</a>

			</form>

			<!--<p><a href="{{ url('/empleados') }}">Volver al listado de usuario</a></p>-->	
			<!--<p><a href="{{ url()->previous() }}">Volver al listado de empleados</a></p>-->
			<!--<p><a href="{{ action('EmpleadosController@index') }}">Volver al listado de usuario</a></p>-->
			<!--<p><a href="{{ route('empleados.index') }}">Volver al listado de empleados</a></p>-->

			<!--con boton me gusta mas
			<form action="{{ route('empleados.index') }}"><button type="submit" class="btn btn-warning">Volver</button></form>-->

		</div>

	</div>

@endsection