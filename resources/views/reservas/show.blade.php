@extends('admin') 

@section('title', "Reserva con # $reserva->id")

@section('content')


	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h2>Reserva {{ $reserva->id }}</h2>
		<a href="{{ route('reservas.index') }}" class="btn btn-warning">Volver</a>

	</div>

		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
			
				<thead class="table-dark">
					
					<tr>
						<th class="col-sm-2">Reserva la pista</th>
						<th class="col-sm-1">Pista</th>
						<th class="col-sm-1">Horario</th>
						<th class="col-sm-3">Jugadores</th>
						<th class="col-sm-1">Nivel</th>
						<th class="col-sm-1">fecha</th>
						<th class="col-sm-2">Huecos disponibles</th>
						<th class="col-sm-1">Acciones</th>

					</tr>

				</thead>

				<tbody class="table">

						<tr>
							<td>{{ $reserva->obtenerRol($reserva->id_hace_reserva) }}  {{ $reserva->obtenerJugador($reserva->id_hace_reserva) }}</td>
							<td>{{ $reserva->obtenerPista() }}</td>
							<td>{{ $reserva->obtenerHorario() }}</td>

							<td>

								@if ($reserva->obtenerJugador($reserva->id_jugador_1))

									<p class='d-flex justify-content-between align-items-end mb-3'>
										<a class="letraColor" href="{{ route('jugadores.show', $reserva->id_jugador_1) }}">
											{{ $reserva->obtenerJugador($reserva->id_jugador_1) }} 
										</a>
										<span class="btn btn-outline-dark btn-sm"> (Telf: {{ $reserva->obtenerTelfJugador($reserva->id_jugador_1) }})</span>
										<!--<a href="" class="btn btn-warning"><span class="oi oi-trash"></span></a>-->
									</p>

								@endif

								@if ($reserva->obtenerJugador($reserva->id_jugador_2))

									<p class='d-flex justify-content-between align-items-end mb-3'>
										<a class="letraColor" href="{{ route('jugadores.show', $reserva->id_jugador_2) }}">
											{{ $reserva->obtenerJugador($reserva->id_jugador_2) }} 
										</a>
										<span class="btn btn-outline-dark btn-sm"> (Telf: {{ $reserva->obtenerTelfJugador($reserva->id_jugador_2) }})</span>
										<!--<a href="" class="btn btn-warning"><span class="oi oi-trash"></span></a>-->
									</p>

								@endif

								@if ($reserva->obtenerJugador($reserva->id_jugador_3))

									<p class='d-flex justify-content-between align-items-end mb-3'>
										<a class="letraColor" href="{{ route('jugadores.show', $reserva->id_jugador_3) }}">
											{{ $reserva->obtenerJugador($reserva->id_jugador_3) }} 
										</a>
										<span class="btn btn-outline-dark btn-sm"> (Telf: {{ $reserva->obtenerTelfJugador($reserva->id_jugador_3) }})</span>
										<!--<a href="" class="btn btn-warning"><span class="oi oi-trash"></span></a>-->
									</p>

								@endif

								@if ($reserva->obtenerJugador($reserva->id_jugador_4))

									<p class='d-flex justify-content-between align-items-end mb-3'>
										<a class="letraColor" href="{{ route('jugadores.show', $reserva->id_jugador_4) }}">
											{{ $reserva->obtenerJugador($reserva->id_jugador_4) }} 
										</a>
										<span class="btn btn-outline-dark btn-sm"> (Telf: {{ $reserva->obtenerTelfJugador($reserva->id_jugador_4) }})</span>
										<!--<a href="" class="btn btn-warning"><span class="oi oi-trash"></span></a>-->
									</p>

								@endif

							</td>

							<td>{{ $reserva->obtenerNivelReserva() }}</td>

							<td>{{ $reserva->formatoFecha($reserva->id) }}</td>

							@if($reserva->contarNumeroJugadores() == 0)

								<td class="text-center"><a class="btn btn-danger">Completa <span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a></td>

							@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)

								<td class="text-center"><a class="btn btn-warning">Huecos libres <span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a></td>

							@else

								<td class="text-center"><a class="btn btn-primary">Libre <span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a></td>

							@endif
				
							

							<td class="text-center">
								
								<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


									{!! csrf_field() !!} 

									{{ method_field('DELETE') }} 

									<div class="btn-group">
										
										<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

										<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

									</div>
								</form>
							</td>
						</tr>
				</tbody>
			</table>
		</div>

@endsection