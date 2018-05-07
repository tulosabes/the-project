@extends('admin') 

@section('title', "Editar $pista->name")

@section('content')
<div class="row justify-content-center"> 
	<div class="card col-sm-12 col-md-8">
		
		<h4 class="card-header letraColor">
			Editar {{ $pista->name }}
		</h4>

		<div class="card-body">
			
			<form role='form' method="POST" action='{{ route("pistas.show", $pista) }}'>

				{{ method_field('PUT') }} <!--campo oculto para decirle que estamos enviando por PUT y no por post-->

				{!! csrf_field() !!}
				
				<div class="row">
					<div class="form-group col-sm-12 col-md-6">
						
						<label for="name" class="control-label">Nombre:</label>
						<input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name', $pista->name) }}">

						@if ($errors->has('name'))

							<div class="alert alert-danger">{{ $errors->first('name') }}</div>

						@endif

					</div>
				</div>

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-10">
					
						<label for="descripcion" class="control-label">Descripción:</label>
						<textarea name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion', $pista->descripcion) }}" maxlength="150">{{ old('descripcion', $pista->descripcion) }}</textarea>

						@if ($errors->has('descripcion'))

							<div class="alert alert-danger">{{ $errors->first('descripcion') }}</div>

						@endif

					</div>

				</div>

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-6">
					
						<label for="disponibilidad" class="control-label">Disponibilidad:</label>
						<select name="disponibilidad" id="disponibilidad" class="form-control">

							@if ($pista->disponibilidad === 0)

								<option value="0" selected="selected">No disponible</option>
								<option value="1">Disponible</option>

							@else

								<option value="0">No disponible</option>
								<option value="1" selected="selected">Disponible</option>

							@endif
		

						</select>

						@if ($errors->has('disponible'))

							<div class="alert alert-danger">{{ $errors->first('disponible') }}</div>

						@endif

					</div>

				</div>

				<div class="row">
					
					<div class="form-group col-sm-12">
						
						<button type="submit" class="btn btn-primary">Actualizar pista</button>
						<a href="{{ route('pistas.index') }}" class="btn btn-warning">Volver</a>

					</div>	

				</div>

			</form>
	</div>
</div>

@endsection