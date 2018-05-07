@extends('admin') 

@section('title', "Editar reserva $reserva->id")



@section('content')

<div class="row justify-content-center"> 

	<div class="card col-sm-12 col-md-12">
		
		<h4 class="card-header letraColor">
			Editar reserva {{ $reserva->id }}
		</h4>

		<div class="card-body">
			
			<form method="POST" action="{{ route('reservas.show', $reserva) }}" role='form'>

				{!! csrf_field() !!} 

				{{ method_field('PUT') }}


				<div class="row">
					
					<div class="form-group col-3">
						
						<label for="fecha">Fecha</label>
						<input type="date" name="fecha" id="fecha" value="{{ $reserva->fecha }}" min="{{ $reserva->fecha }}" max="{{ $reserva->fecha }}" class="form-control"></input>

					</div>

					<div class="form-group col-3">
					
						<label for="pistas" class="control-label">Pista:</label><br>

						<select name="pistas" id="pistas" class="form-control">

							<option value="">Pista</option>
							
							@foreach ($pistas as $pista)

								@if($pista->id == $reserva->id_pista)

									<option value="{{ $pista->id }}" selected="selected">{{ $pista->name }}</option>

								@else

									<option value="{{ $pista->id }}" disabled="disabled">{{ $pista->name }}</option>

								@endif

							@endforeach

						</select>		

						@if ($errors->has('pistas'))

							<div class="alert alert-danger">{{ $errors->first('pistas') }}</div>

						@endif

					</div>

					<div class="form-group col-3">

						<label for="horarios" class="control-label">Horario:</label><br>

						<select name="horarios" id="horarios" class="form-control">

							<option value="">Horario</option>
							
							@foreach ($horarios as $horario)

								@if($horario->id == $reserva->id_horario)

									<option value="{{ $horario->id }}" selected="selected">{{ $horario->hora }}</option>

								@else

									<option value="{{ $horario->id }}" disabled="disabled">{{ $horario->hora }}</option>

								@endif

							@endforeach

						</select>		

						@if ($errors->has('horarios'))

							<div class="alert alert-danger">{{ $errors->first('horarios') }}</div>

						@endif

					</div>
					

					<div class="form-group col-3">
					
						<label for="nivel" class="control-label">Nivel:</label>

						<select name="nivel" id="nivel" class="form-control">

							<option value="">Nivel de la partida</option>
							
							@foreach ($niveles as $nivel)

								@if($nivel->id == $reserva->id_nivel)

									<option value="{{ $nivel->id }}" selected="selected">{{ $nivel['nivel'] }}</option>

								@else

									<option value="{{ $nivel->id }}" disabled="disabled">{{ $nivel['nivel'] }}</option>

								@endif

								

							@endforeach

						</select>

						@if ($errors->has('nivel'))

							<div class="alert alert-danger">{{ $errors->first('nivel') }}</div>

						@endif

					</div>

				</div>

				<div class="row">
					
					<div class="form-group col-3">
                    
	                    <label for="jugador1" class="control-label">Jugador 1:</label>
	                    <select name="jugador1" id="jugador1" class="form-control">
	                        
	                        <option value="" class="btn-outline-danger" id="optionJugador1">Seleccionar jugador</option>

	                        @foreach($jugadores as $jug)

	                        		@if(isset($reserva))

	                        			@if($reserva->id_jugador_1 == $jug->id)

		                                	<option class="letraColor" value="{{ $jug->id }}" selected="selected">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>
		                               
		                                @endif

		                                	<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

		                            @else

		                            	<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

		                            @endif


	                        @endforeach

	                    </select>

	                    @if ($errors->has('jugador1'))

	                        <div class="alert alert-danger">{{ $errors->first('jugador1') }}</div>

	                    @endif


	                </div>

	                <div class="form-group col-3">
	                    
	                    <label for="jugador2" class="control-label">Jugador 2:</label>
	                    <select name="jugador2" id="jugador2" class="form-control">
	                        
	                        <option value="" class="btn-outline-danger" id="optionJugador2">Seleccionar jugador</option>

	                        @foreach($jugadores as $jug)

	                                @if(isset($reserva))

	                        			@if($reserva->id_jugador_2 == $jug->id)

		                                	<option class="letraColor" value="{{ $jug->id }}" selected="selected">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>
		                               
		                                @endif

		                                	<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

		                            @else

		                            	<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

		                            @endif

	                        @endforeach

	                    </select>

	                    @if ($errors->has('jugador2'))

	                        <div class="alert alert-danger">{{ $errors->first('jugador2') }}</div>

	                    @endif


	                </div>

	                <div class="form-group col-3">
	                    
	                    <label for="jugador3" class="control-label">Jugador 3:</label>
	                    <select name="jugador3" id="jugador3" class="form-control">
	                        
	                        <option value="" class="btn-outline-danger" id="optionJugador3">Seleccionar jugador</option>

	                        @foreach($jugadores as $jug)

	                                @if(isset($reserva))

	                        			@if($reserva->id_jugador_3 == $jug->id)

		                                	<option class="letraColor" value="{{ $jug->id }}" selected="selected">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>
		                               
		                                @endif

		                                	<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

		                            @else

		                            	<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

		                            @endif

	                        @endforeach

	                    </select>

	                    @if ($errors->has('jugador3'))

	                        <div class="alert alert-danger">{{ $errors->first('jugador3') }}</div>

	                    @endif


	                </div>

	                <div class="form-group col-3">
	                    
	                    <label for="jugador4" class="control-label">Jugador 4:</label>
	                    <select name="jugador4" id="jugador4" class="form-control">
	                        
	                        <option value="" class="btn-outline-danger" id="optionJugador4">Seleccionar jugador</option>

	                        @foreach($jugadores as $jug)

	                                @if(isset($reserva))

	                        			@if($reserva->id_jugador_4 == $jug->id)

		                                	<option class="letraColor" value="{{ $jug->id }}" selected="selected">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>
		                               
		                                @endif

		                                	<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

		                            @else

		                            	<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

		                            @endif

	                        @endforeach

	                    </select>

	                    @if ($errors->has('jugador4'))

	                        <div class="alert alert-danger">{{ $errors->first('jugador2') }}</div>

	                    @endif


	                </div>

				</div>



				<button type="submit" class="btn btn-primary">Actualizar reserva</button>
				<a href="{{ route('reservas.index') }}" class="btn btn-warning">Volver</a>

			</form>
		</div>
	</div>
</div>
@endsection