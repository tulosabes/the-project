@extends('admin') 

@section('title', "Crear reserva")

@section('script');
	<script src="{{ asset('js/scriptReservas.js') }}"></script> 
@endsection

@section('content')

<div class="row justify-content-center"> 
	<div class="card col-sm-12 col-md-12">
		
		<h4 class="card-header letraColor">
			Crear reserva
		</h4>

		<div class="card-body">
			
			<form method="POST" action="{{ route('reservas.store') }}" role='form'>

				{!! csrf_field() !!} <!-- proteccion de la insercion de datos de terceros, este toquen mantiene la proteccion activa y es mejor usarlo aqui que quitarlo del archivo Http/Kernel.php la directiva \App\Http\Middleware\VerifyCsrfToken::class valdria con comentarla (siempre dentro del formulario)

				Genera un campo oculto que contiene el token para pasar la proteccion contra ataques de tipo CSRF que provee Laravel por defecto
				-->

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-12 col-lg-3">
						
						<label for="fecha">Fecha</label>
						<input type="date" name="fecha" id="fecha" value="{{ $datos['fecha'] }}" min="{{ $datos['fecha'] }}" max="{{ $datos['fecha'] }}" class="form-control"></input>

					</div>

					<div class="form-group col-sm-12 col-md-12 col-lg-3">
					
						<label for="pistas" class="control-label">Pista:</label><br>

						<select name="pistas" id="pistas" class="form-control">

							<option value="">Pista</option>
							
							@foreach ($pistas as $pista)

								@if($pista->id == $datos['pista'])

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

					<div class="form-group col-sm-12 col-md-12 col-lg-3">

						<label for="horarios" class="control-label">Horario:</label><br>

						<select name="horarios" id="horarios" class="form-control">

							<option value="">Horario</option>
							
							@foreach ($horarios as $horario)

								@if($horario->id == $datos['horario'])

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
					

					<div class="form-group col-sm-12 col-md-12 col-lg-3">
					
						<label for="nivel" class="control-label">Nivel:</label>

						<select name="nivel" id="nivel" class="form-control">

							<option value="0" id="optionNivel" selected="selected">Seleccione el nivel</option>
							
							@foreach ($niveles as $nivel)

								<option value="{{ $nivel->id }}">{{ $nivel['nivel'] }}</option>

							@endforeach

						</select>

						@if ($errors->has('nivel'))

							<div class="alert alert-danger">{{ $errors->first('nivel') }}</div>

						@endif

					</div>

				</div>

				<div class="row">
					
					<div class="form-group col-sm-12 col-md-12 col-lg-3">
                    
	                    <label for="jugador1" class="control-label">Jugador 1:</label>
	                    <select name="jugador1" id="jugador1" class="form-control">
	                        
	                        <option value="" class="btn-outline-danger" id="optionJugador1">Seleccionar jugador</option>

	                        <!--@foreach($jugadores as $jug)

								@if(isset($reserva))

									@if($reserva->id_jugador_1 == $jug->id)

										<option class="letraColor" value="{{ $jug->id }}" selected="selected">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>
								
									@endif

										<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

								@else

									<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

								@endif


	                        @endforeach-->

	                    </select>

	                    @if ($errors->has('jugador1'))

	                        <div class="alert alert-danger">{{ $errors->first('jugador1') }}</div>

	                    @endif


	                </div>

	                <div class="form-group col-sm-12 col-md-12 col-lg-3">
	                    
	                    <label for="jugador2" class="control-label">Jugador 2:</label>
	                    <select name="jugador2" id="jugador2" class="form-control">
	                        
	                        <option value="" class="btn-outline-danger" id="optionJugador2">Seleccionar jugador</option>

	                        <!--@foreach($jugadores as $jug)

								@if(isset($reserva))

									@if($reserva->id_jugador_2 == $jug->id)

										<option class="letraColor" value="{{ $jug->id }}" selected="selected">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>
								
									@endif

										<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

								@else

									<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

								@endif

	                        @endforeach-->

	                    </select>

	                    @if ($errors->has('jugador2'))

	                        <div class="alert alert-danger">{{ $errors->first('jugador2') }}</div>

	                    @endif


	                </div>

	                <div class="form-group col-sm-12 col-md-12 col-lg-3">
	                    
	                    <label for="jugador3" class="control-label">Jugador 3:</label>
	                    <select name="jugador3" id="jugador3" class="form-control">
	                        
	                        <option value="" class="btn-outline-danger" id="optionJugador3">Seleccionar jugador</option>

	                        <!--@foreach($jugadores as $jug)

								@if(isset($reserva))

									@if($reserva->id_jugador_3 == $jug->id)

										<option class="letraColor" value="{{ $jug->id }}" selected="selected">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>
								
									@endif

										<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

								@else

									<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

								@endif

	                        @endforeach-->

	                    </select>

	                    @if ($errors->has('jugador3'))

	                        <div class="alert alert-danger">{{ $errors->first('jugador3') }}</div>

	                    @endif


	                </div>

	                <div class="form-group col-sm-12 col-md-12 col-lg-3">
	                    
	                    <label for="jugador4" class="control-label">Jugador 4:</label>
	                    <select name="jugador4" id="jugador4" class="form-control">
	                        
	                        <option value="" class="btn-outline-danger" id="optionJugador4">Seleccionar jugador</option>

	                        <!--@foreach($jugadores as $jug)

								@if(isset($reserva))

									@if($reserva->id_jugador_1 == $jug->id)

										<option class="letraColor" value="{{ $jug->id }}" selected="selected">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>
								
									@endif

										<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

								@else

									<option class="letraColor" value="{{ $jug->id }}">{{ $jug->name }} {{ $jug->telefono }} ({{ substr($jug->obtenerNivel(),0,3) }})</option>

								@endif

	                        @endforeach-->

	                    </select>

	                    @if ($errors->has('jugador4'))

	                        <div class="alert alert-danger">{{ $errors->first('jugador4') }}</div>

	                    @endif


	                </div>

				</div>



				<button type="submit" class="btn btn-success">Crear reserva</button>
				<a href="{{ route('reservas.index') }}" class="btn btn-warning">Volver</a>

			</form>

		</div>

	</div>

</div>

@endsection