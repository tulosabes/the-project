@extends('admin') 

@section('title', "Reserva con # $reserva->id")

@section('content')

	<table class="table table-bordered">

				<h2>Reserva con # {{ $reserva->id }}</h2>
			
				<thead class="table-dark">
					
					<tr>
						<th>Hace la reserva</th>
						<th>Pista</th>
						<th>Horario</th>
						<th>Jugadores</th>
						<th>Nivel</th>
						<th>fecha</th>
						<th>Huecos disponibles</th>
						<th>Acciones</th>

					</tr>

				</thead>

				<tbody>
					
					

						<tr>
							<td>{{ $reserva->obtenerRol($reserva->id_hace_reserva) }} <br> {{ $reserva->obtenerJugador($reserva->id_hace_reserva) }}</td>
							<td>{{ $reserva->obtenerPista() }}</td>
							<td>{{ $reserva->obtenerHorario() }}</td>

							<td>

								@if ($reserva->obtenerJugador($reserva->id_jugador_1))

									<p>{{ $reserva->obtenerJugador($reserva->id_jugador_1) }}</p>

								@endif

								@if ($reserva->obtenerJugador($reserva->id_jugador_2))

									<p>{{ $reserva->obtenerJugador($reserva->id_jugador_2) }}</p>

								@endif

								@if ($reserva->obtenerJugador($reserva->id_jugador_3))

									<p>{{ $reserva->obtenerJugador($reserva->id_jugador_3) }}</p>

								@endif

								@if ($reserva->obtenerJugador($reserva->id_jugador_4))

									<p>{{ $reserva->obtenerJugador($reserva->id_jugador_4) }}</p>

								@endif

							</td>

							<td>{{ $reserva->obtenerNivel($reserva->id_hace_reserva) }}</td>

							<td>{{ $reserva->formatoFecha($reserva->id) }}</td>

							@if($reserva->contarNumeroJugadores() == 0)

								<td><a class="btn btn-danger">Completa <span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a></td>

							@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)

								<td><a class="btn btn-warning">Huecos libres <span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a></td>

							@else

								<td><a class="btn btn-primary">Libre <span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a></td>

							@endif
				
							

							<td>
								
								<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


									{!! csrf_field() !!} 

									{{ method_field('DELETE') }} 

									<div class="btn-group">
										
										<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>

										<button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>

									</div>
								</form>
							</td>
						</tr>

					

				</tbody>

			</table>

@endsection