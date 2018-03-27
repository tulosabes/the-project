@extends('admin') 

@section('title', "Editar jugador $jugador->name")

@section('content')

	<div class="card">
		
		<h4 class="card-header">
			Editar jugador {{ $jugador->name }}
		</h4>

		<div class="card-body">
			
			<form role='form' method="POST" action='{{ url("admin/jugadores/{$jugador->id}") }}'>

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

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="dni" class="control-label">Dni:</label>
					<input type="text" name="dni" id="dni" placeholder="48300300w" class="form-control"  value="{{ old('dni', $jugador->dni) }}">

					@if ($errors->has('dni'))

						<div class="alert alert-danger">{{ $errors->first('dni') }}</div>

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

						<option value="">Elija el nivel del jugador</option>
						
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

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="poblacion" class="control-label">Poblacion:</label>
					<input type="text" name="poblacion" id="poblacion" placeholder="Benidorm" class="form-control" value="{{ old('poblacion', $jugador->poblacion) }}">

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="provincia" class="control-label">Provincia:</label>
					<input type="text" name="provincia" id="provincia" placeholder="Alicante" class="form-control" value="{{ old('provincia', $jugador->provincia) }}">

					<!--@if ($errors->has('password'))

						<div class="alert alert-danger">{{ $errors->first('password') }}</div>

					@endif-->

				</div>

				<div class="form-group">
					
					<label for="c_postal" class="control-label">Código postal:</label>
					<input type="text" name="c_postal" id="c_postal" placeholder="03500" class="form-control" value="{{ old('c_postal', $jugador->c_postal) }}">

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

				<button type="submit" class="btn btn-success">Actualizar jugador</button>
				<a href="{{ route('jugadores.index') }}" class="btn btn-warning">Volver</a>

			</form>
		</div>

	</div>

@endsection