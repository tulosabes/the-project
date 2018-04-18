@extends('admin') 

@section('title', "Editar club")

@section('content')

	<div class="card">
		
		<h4 class="card-header">
			Editar club
		</h4>

		<div class="card-body">
			
			<form role='form' method="POST" action="{{ route('club.show', $club) }}">

				{{ method_field('PUT') }} <!--campo oculto para decirle que estamos enviando por PUT y no por post-->

				{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)

				Genera un campo oculto que contiene el token para pasar la proteccion contra ataques de tipo CSRF que provee Laravel por defecto
				-->

				
				<div class="form-group">
					
					<label for="name" class="control-label">Nombre:</label>
					<input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name', $club->name) }}">

					@if ($errors->has('name'))

						<div class="alert alert-danger">{{ $errors->first('name') }}</div>

					@endif

				</div>

				

				<div class="form-group">
					
					<label for="email" class="control-label">Correo electrónico:</label>
					<input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" class="form-control" value="{{ old('email' , $club->email) }}"><!-- en value le ponemos el metodo old('nombre_campo') con esto hacemos que se guarde el valor en caso de tener errores en los demas campos-->

					@if ($errors->has('email'))

						<div class="alert alert-danger">{{ $errors->first('email') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="telefono" class="control-label">Telefono:</label>
					<input type="text" name="telefono" id="telefono" placeholder="666777888" class="form-control"  value="{{ old('telefono', $club->telefono) }}">

					@if ($errors->has('telefono'))

						<div class="alert alert-danger">{{ $errors->first('telefono') }}</div>

					@endif

				</div>	

				<div class="form-group">
					
					<label for="direccion" class="control-label">Direccion:</label>
					<input type="text" name="direccion" id="direccion" placeholder="" class="form-control" value="{{ old('direccion', $club->direccion) }}">

					@if ($errors->has('direccion'))

						<div class="alert alert-danger">{{ $errors->first('direccion') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="poblacion" class="control-label">Poblacion:</label>
					<input type="text" name="poblacion" id="poblacion" placeholder="Benidorm" class="form-control" value="{{ old('poblacion', $club->poblacion) }}">

					@if ($errors->has('poblacion'))

						<div class="alert alert-danger">{{ $errors->first('poblacion') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="provincia" class="control-label">Provincia:</label>
					<input type="text" name="provincia" id="provincia" placeholder="Alicante" class="form-control" value="{{ old('provincia', $club->provincia) }}">

					@if ($errors->has('provincia'))

						<div class="alert alert-danger">{{ $errors->first('provincia') }}</div>

					@endif

				</div>

				<div class="form-group">
					
					<label for="c_postal" class="control-label">Código postal:</label>
					<input type="text" name="c_postal" id="c_postal" placeholder="03500" class="form-control" value="{{ old('c_postal', $club->c_postal) }}">

					@if ($errors->has('c_postal'))

						<div class="alert alert-danger">{{ $errors->first('c_postal') }}</div>

					@endif

				</div>


				<button type="submit" class="btn btn-success">Actualizar club</button>
				<a href="{{ route('club.index') }}" class="btn btn-warning">Volver</a>

			</form>
		</div>

	</div>

@endsection