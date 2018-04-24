@extends('admin') 

@section('title', "Editar club")

@section('content')

	<div class="card col-sm-12 col-md-8">
		
		<h4 class="card-header">
			Editar club {{ $club->name }}
		</h4>

		<div class="card-body">
			
			<form role='form' method="POST" action="{{ route('club.show', $club) }}">

				{{ method_field('PUT') }} <!--campo oculto para decirle que estamos enviando por PUT y no por post-->

				{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)

				Genera un campo oculto que contiene el token para pasar la proteccion contra ataques de tipo CSRF que provee Laravel por defecto
				-->

				
				<div class="row">
					
					<div class="form-group col-sm-12 col-md-6 col-lg-4">
					
						<label for="name" class="control-label">Nombre:</label>
						<input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name', $club->name) }}">

						@if ($errors->has('name'))

							<div class="alert alert-danger">{{ $errors->first('name') }}</div>

						@endif

					</div>

				</div>

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-8 col-lg-6">
					
						<label for="email" class="control-label">Correo electrónico:</label>
						<input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" class="form-control" value="{{ old('email' , $club->email) }}"><!-- en value le ponemos el metodo old('nombre_campo') con esto hacemos que se guarde el valor en caso de tener errores en los demas campos-->

						@if ($errors->has('email'))

							<div class="alert alert-danger">{{ $errors->first('email') }}</div>

						@endif

					</div>

					<div class="form-group col-sm-12 col-md-4 col-lg-4">
						
						<label for="telefono" class="control-label">Teléfono:</label>
						<input type="text" name="telefono" id="telefono" placeholder="666777888" class="form-control"  value="{{ old('telefono', $club->telefono) }}">

						@if ($errors->has('telefono'))

							<div class="alert alert-danger">{{ $errors->first('telefono') }}</div>

						@endif

					</div>

				</div>		

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-12 col-lg-10">
					
						<label for="direccion" class="control-label">Dirección:</label>
						<input type="text" name="direccion" id="direccion" placeholder="" class="form-control" value="{{ old('direccion', $club->direccion) }}">

						@if ($errors->has('direccion'))

							<div class="alert alert-danger">{{ $errors->first('direccion') }}</div>

						@endif

					</div>

					<div class="form-group col-sm-12 col-md-4 col-lg-4">
	                    
	                    <label for="provincia" class="control-label">Provincia:</label>
	                    <select name="provincia" id="provincia" class="form-control">
	                        
	                        @foreach($provincias as $pro)

	                        	

	                            @if ($club->id_provincia === $pro->id)

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

	                <div class="form-group col-sm-12 col-md-4 col-lg-4">
	                    
	                    <label for="poblacion" class="control-label">Población:</label>
	                    <select name="poblacion" id="poblacion" class="form-control">
	                        
	                        @foreach ($poblaciones as $poblacion)


	                            @if ($club->id_poblacion === $poblacion->id)

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
					
					<div class="form-group col-sm-12">
						
						<button type="submit" class="btn btn-primary">Actualizar club</button>
						<a href="{{ route('club.index') }}" class="btn btn-warning">Volver</a>

					</div>

				</div>

			</form>
		</div>

	</div>

@endsection