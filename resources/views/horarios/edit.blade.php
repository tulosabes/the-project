@extends('admin') 

@section('title', "Editar $horario->name")

@section('content')

	<div class="card col-sm-12 col-md-10 col-lg-6">
		
		<h4 class="card-header">
			Editar {{ $horario->name }}
		</h4>

		<div class="card-body">
			
			<form role='form' method="POST" action='{{ route("horarios.show", $horario) }}'>

				{{ method_field('PUT') }} <!--campo oculto para decirle que estamos enviando por PUT y no por post-->

				{!! csrf_field() !!}
				
				<div class="form-group col-sm-12 col-md-12">
					
					<label for="name" class="control-label">Nombre:</label>
					<input type="text" name="name" id="name" placeholder="Carlos" class="form-control" value="{{ old('name', $horario->name) }}">

					@if ($errors->has('name'))

						<div class="alert alert-danger">{{ $errors->first('name') }}</div>

					@endif

				</div>

				<div class="form-group col-sm-12 col-md-12">
					
					<label for="hora" class="control-label">Horarios:</label>
					<select name="hora" id="hora" class="form-control">

						@foreach ($horas as $hor)

							@if ($hor->hora === $horario->hora)

								<option value="{{ $hor->hora }}" selected="selected">{{ $hor->hora }}</option>

							@else

								<option value="{{ $hor->hora }}">{{ $hor->hora }}</option>

							@endif


						@endforeach


					</select>

					@if ($errors->has('hora'))

						<div class="alert alert-danger">{{ $errors->first('hora') }}</div>

					@endif

				</div>

				<button type="submit" class="btn btn-primary">Actualizar horario</button>
				<a href="{{ route('horarios.index') }}" class="btn btn-warning">Volver</a>

			</form>

	</div>
@endsection