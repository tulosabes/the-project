@extends('admin') 

@section('title', 'Reservas')

@section('content')

	<div class="row justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<!--<div class="btn-group">

			<a href="" class="btn btn-primary">Ver reservas</a>

			<a href="{{ route('reservas.create') }}" class="btn btn-primary">Crear reserva</a>

		</div>-->

		<div class="btn-group">
			
			<span class="btn btn-danger" id="completas">Completas <span class="badge badge-light">0</span></span>
			<span class="btn btn-warning">Incompletas <span class="badge badge-light">2</span></span>
			<span class="btn btn-primary">Libre <span class="badge badge-light">4</span></span>

		</div>

	</div>

<!--	<div class="row" id="diahorpist1">

		<div class="col-6">

			<h3>{{ ucwords($date->formatLocalized('%A %d')) }}</h3>

			<table class="table table-bordered">
							
				<thead class="table-dark">
								
					<tr>
									
						@foreach($pistas as $pista)

							<th>
								{{ $pista->name }}
							</th>
								
						@endforeach

					</tr>

				</thead>

				<tbody class="table">
								
					<tr>
						@foreach($pistas as $pista)
							<td>
								@foreach($horarios as $horario)

									<p>
												
										<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }}</a>

									</p>

								@endforeach
											
							</td>
						@endforeach
					</tr>
								
				</tbody>

			</table>
		</div>

		<div class="col-6">
			
			<h3>{{ ucwords($date->addDay(1)->formatLocalized('%A %d')) }}</h3>

			<table class="table table-bordered">
							
				<thead class="table-dark">
								
					<tr>
									
						@foreach($pistas as $pista)

							<th>
											{{ $pista->name }}
							</th>
								
						@endforeach

					</tr>

				</thead>

				<tbody class="table">
								
					<tr>
						@foreach($pistas as $pista)
							<td>
								@foreach($horarios as $horario)
												
									<p>
												
										<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }}</a>

									</p>

								@endforeach
											
							</td>
						@endforeach
					</tr>
								
				</tbody>

			</table>
		</div>

	</div>

	<div class="row" id="diahorpist2">

		<div class="col-6">

			<h3>{{ ucwords($date->addDay(1)->formatLocalized('%A %d')) }}</h3>

			<table class="table table-bordered">
							
				<thead class="table-dark">
								
					<tr>
									
						@foreach($pistas as $pista)

							<th>
								{{ $pista->name }}
							</th>
								
						@endforeach

					</tr>

				</thead>

				<tbody class="table">
								
					<tr>
						@foreach($pistas as $pista)
							<td>
								@foreach($horarios as $horario)

									<p>
												
										<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }}</a>

									</p>

								@endforeach
											
							</td>
						@endforeach
					</tr>
								
				</tbody>

			</table>
		</div>

		<div class="col-6">
			
			<h3>{{ ucwords($date->addDay(1)->formatLocalized('%A %d')) }}</h3>

			<table class="table table-bordered">
							
				<thead class="table-dark">
								
					<tr>
									
						@foreach($pistas as $pista)

							<th>
											{{ $pista->name }}
							</th>
								
						@endforeach

					</tr>

				</thead>

				<tbody class="table">
								
					<tr>
						@foreach($pistas as $pista)
							<td>
								@foreach($horarios as $horario)
												
									<p>
												
										<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }}</a>

									</p>

								@endforeach
											
							</td>
						@endforeach
					</tr>
								
				</tbody>

			</table>
		</div>

	</div>-->


	<!--<div class="row" id="diahorpist3">

		<div class="col-6">

			<h3>{{ ucwords($date->addDay(1)->formatLocalized('%A %d')) }}</h3>

			<table class="table table-bordered">
							
				<thead class="table-dark">
								
					<tr>
									
						@foreach($pistas as $pista)

							<th>
								{{ $pista->name }}
							</th>
								
						@endforeach

					</tr>

				</thead>

				<tbody class="table">
								
					<tr>
						@foreach($pistas as $pista)
							<td>
								@foreach($horarios as $horario)

									<p>
												
										<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }}</a>

									</p>

								@endforeach
											
							</td>
						@endforeach
					</tr>
								
				</tbody>

			</table>
		</div>-->

	<!--	<div class="col-6">
			
			<h3>{{ ucwords($date->addDay(1)->formatLocalized('%A %d')) }}</h3>

			<table class="table table-bordered">
							
				<thead class="table-dark">
								
					<tr>
									
						@foreach($pistas as $pista)

							<th>
											{{ $pista->name }}
							</th>
								
						@endforeach

					</tr>

				</thead>

				<tbody class="table">
								
					<tr>
						@foreach($pistas as $pista)
							<td>
								@foreach($horarios as $horario)
												
									<p>
												
										<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }}</a>

									</p>

								@endforeach
											
							</td>
						@endforeach
					</tr>
								
				</tbody>

			</table>
		</div>

	</div>-->


	<!--<div class="row" id="diahorpist4">

		<div class="col-6">

			<h3>{{ ucwords($date->addDay(1)->formatLocalized('%A %d')) }}</h3>

			<table class="table table-bordered">
							
				<thead class="table-dark">
								
					<tr>
									
						@foreach($pistas as $pista)

							<th>
								{{ $pista->name }}
							</th>
								
						@endforeach

					</tr>

				</thead>

				<tbody class="table">
								
					<tr>
						@foreach($pistas as $pista)
							<td>
								@foreach($horarios as $horario)

									<p>
												
										<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }}</a>

									</p>

								@endforeach
											
							</td>
						@endforeach
					</tr>
								
				</tbody>

			</table>
		</div>
	</div>-->



	<div class="row ">
		
		<div class="col-12">
			
			<ul class="nav nav-tabs" role='tablist'>
				<li class="nav-item"><a class="nav-link active" id="dia1-tab" data-toggle='tab' href="#dia1" role='tab' arial-controls='dia1' aria-selected='true'>{{ ucwords($date->now()->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia2-tab" data-toggle='tab' href="#dia2" role='tab' arial-controls='dia2' aria-selected='false'>{{ ucwords($date->now()->addDay(1)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia3-tab" data-toggle='tab' href="#dia3" role='tab' arial-controls='dia3' aria-selected='false'>{{ ucwords($date->now()->addDay(2)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia4-tab" data-toggle='tab' href="#dia4" role='tab' arial-controls='dia4' aria-selected='false'>{{ ucwords($date->now()->addDay(3)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia5-tab" data-toggle='tab' href="#dia5" role='tab' arial-controls='dia5' aria-selected='false'>{{ ucwords($date->now()->addDay(4)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia6-tab" data-toggle='tab' href="#dia6" role='tab' arial-controls='dia6' aria-selected='false'>{{ ucwords($date->now()->addDay(5)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia7-tab" data-toggle='tab' href="#dia7" role='tab' arial-controls='dia7' aria-selected='false'>{{ ucwords($date->now()->addDay(6)->formatLocalized('%A %d')) }}</a></li>
			</ul>

			<div class="tab-content">
				
				<div class="tab-pane fade show active" id="dia1"  role='tabpanel' arial-labelledby='dia1-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->formatLocalized('%A %d- %B -%Y')) }}</p>

					<table class="table table-bordered">
									
						<thead class="table-dark">
										
							<tr>
											
								@foreach($pistas as $pista)

									<th>
										{{ $pista->name }}
									</th>
										
								@endforeach

							</tr>

						</thead>

						<tbody class="table">
										
							<tr>
								@foreach($pistas as $pista)
									<td>
										@foreach($horarios as $horario)

											<p>
												<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }} </a>

												<span class="btn-group">

													@foreach($reservas as $reserva)

														@if($reserva->obtenerPistaHorario($pista->id,$horario->id, $date->now()->formatLocalized('%Y-%m-%d')) == true && $reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora)

															@if($reserva->contarNumeroJugadores() == 0)

																<a  href="{{ route('reservas.show', $reserva) }}" class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>
																

															@elseif($reserva->contarNumeroJugadores() > 0 || $reserva->contarNumeroJugadores() < 4)

																<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->formatLocalized('%Y-%m-%d'), 'reserva' => $reserva]) }}" class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

															@endif

														@endif

													@endforeach

													@if($horario->obtenerReserva($pista->id,$date->now()->formatLocalized('%Y-%m-%d')) == false)

														<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary"><span class="badge badge-light">4</span></a>
														<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
														<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

													@endif

												</span>

											</p>

										@endforeach
													
									</td>
								@endforeach
							</tr>
										
						</tbody>

					</table>

				</div>
		
				<div class="tab-pane fade" id="dia2" role='tabpanel' arial-labelledby='dia2-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(1)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<table class="table table-bordered">
									
						<thead class="table-dark">
										
							<tr>
											
								@foreach($pistas as $pista)

									<th>
										{{ $pista->name }}
									</th>
										
								@endforeach

							</tr>

						</thead>

						<tbody class="table">
										
							<tr>
								@foreach($pistas as $pista)
									<td>
										@foreach($horarios as $horario)

											<p>
												<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(1)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }} </a>

												<span class="btn-group">

													@foreach($reservas as $reserva)

														@if($reserva->obtenerPistaHorario($pista->id,$horario->id, $date->now()->addDay(1)->formatLocalized('%Y-%m-%d')) == true && $reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora)

															@if($reserva->contarNumeroJugadores() == 0)

																<a  href="{{ route('reservas.show', $reserva) }}" class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>
																

															@elseif($reserva->contarNumeroJugadores() > 0 || $reserva->contarNumeroJugadores() < 4)

																<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(1)->formatLocalized('%Y-%m-%d'), 'reserva' => $reserva]) }}" class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

															@endif

														@endif

													@endforeach

													@if($horario->obtenerReserva($pista->id,$date->now()->addDay(1)->formatLocalized('%Y-%m-%d')) == false)

														<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(1)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary"><span class="badge badge-light">4</span></a>
														<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
														<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

													@endif

												</span>

											</p>

										@endforeach
													
									</td>
								@endforeach
							</tr>
										
						</tbody>

					</table>

				</div>
				
				<div class="tab-pane fade" id="dia3" role='tabpanel' arial-labelledby='dia3-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(2)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<table class="table table-bordered">
									
						<thead class="table-dark">
										
							<tr>
											
								@foreach($pistas as $pista)

									<th>
										{{ $pista->name }}
									</th>
										
								@endforeach

							</tr>

						</thead>

						<tbody class="table">
										
							<tr>
								@foreach($pistas as $pista)
									<td>
										@foreach($horarios as $horario)

											<p>
												<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(2)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }} </a>

												<span class="btn-group">

													@foreach($reservas as $reserva)

														@if($reserva->obtenerPistaHorario($pista->id,$horario->id, $date->now()->addDay(2)->formatLocalized('%Y-%m-%d')) == true && $reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora)

															@if($reserva->contarNumeroJugadores() == 0)

																<a  href="{{ route('reservas.show', $reserva) }}" class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>
																

															@elseif($reserva->contarNumeroJugadores() > 0 || $reserva->contarNumeroJugadores() < 4)

																<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(2)->formatLocalized('%Y-%m-%d'), 'reserva' => $reserva]) }}" class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

															@endif

														@endif

													@endforeach

													@if($horario->obtenerReserva($pista->id,$date->now()->addDay(2)->formatLocalized('%Y-%m-%d')) == false)

														<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(2)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary"><span class="badge badge-light">4</span></a>
														<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
														<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

													@endif

												</span>

											</p>

										@endforeach
													
									</td>
								@endforeach
							</tr>
										
						</tbody>

					</table>

				</div>		
				
				<div class="tab-pane fade" id="dia4" role='tabpanel' arial-labelledby='dia4-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(3)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<table class="table table-bordered">
									
						<thead class="table-dark">
										
							<tr>
											
								@foreach($pistas as $pista)

									<th>
										{{ $pista->name }}
									</th>
										
								@endforeach

							</tr>

						</thead>

						<tbody class="table">
										
							<tr>
								@foreach($pistas as $pista)
									<td>
										@foreach($horarios as $horario)

											<p>
												<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(3)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }} </a>

												<span class="btn-group">

													@foreach($reservas as $reserva)

														@if($reserva->obtenerPistaHorario($pista->id,$horario->id, $date->now()->addDay(3)->formatLocalized('%Y-%m-%d')) == true && $reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora)

															@if($reserva->contarNumeroJugadores() == 0)

																<a  href="{{ route('reservas.show', $reserva) }}" class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>
																

															@elseif($reserva->contarNumeroJugadores() > 0 || $reserva->contarNumeroJugadores() < 4)

																<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(3)->formatLocalized('%Y-%m-%d'), 'reserva' => $reserva]) }}" class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

															@endif

														@endif

													@endforeach

													@if($horario->obtenerReserva($pista->id,$date->now()->addDay(3)->formatLocalized('%Y-%m-%d')) == false)

														<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(3)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary"><span class="badge badge-light">4</span></a>
														<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
														<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

													@endif

												</span>

											</p>

										@endforeach
													
									</td>
								@endforeach
							</tr>
										
						</tbody>

					</table>

				</div>
				
				<div class="tab-pane fade" id="dia5" role='tabpanel' arial-labelledby='dia5-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(4)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<table class="table table-bordered">
									
						<thead class="table-dark">
										
							<tr>
											
								@foreach($pistas as $pista)

									<th>
										{{ $pista->name }}
									</th>
										
								@endforeach

							</tr>

						</thead>

						<tbody class="table">
										
							<tr>
								@foreach($pistas as $pista)
									<td>
										@foreach($horarios as $horario)

											<p>
												<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(4)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }} </a>

												<span class="btn-group">

													@foreach($reservas as $reserva)

														@if($reserva->obtenerPistaHorario($pista->id,$horario->id, $date->now()->addDay(4)->formatLocalized('%Y-%m-%d')) == true && $reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora)

															@if($reserva->contarNumeroJugadores() == 0)

																<a  href="{{ route('reservas.show', $reserva) }}" class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>
																

															@elseif($reserva->contarNumeroJugadores() > 0 || $reserva->contarNumeroJugadores() < 4)

																<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(4)->formatLocalized('%Y-%m-%d'), 'reserva' => $reserva]) }}" class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

															@endif

														@endif

													@endforeach

													@if($horario->obtenerReserva($pista->id,$date->now()->addDay(4)->formatLocalized('%Y-%m-%d')) == false)

														<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(4)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary"><span class="badge badge-light">4</span></a>
														<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
														<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

													@endif

												</span>

											</p>

										@endforeach
													
									</td>
								@endforeach
							</tr>
										
						</tbody>

					</table>

				</div>
				
				<div class="tab-pane fade" id="dia6" role='tabpanel' arial-labelledby='dia6-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(5)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<table class="table table-bordered">
									
						<thead class="table-dark">
										
							<tr>
											
								@foreach($pistas as $pista)

									<th>
										{{ $pista->name }}
									</th>
										
								@endforeach

							</tr>

						</thead>

						<tbody class="table">
										
							<tr>
								@foreach($pistas as $pista)
									<td>
										@foreach($horarios as $horario)

											<p>
												<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(5)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }} </a>

												<span class="btn-group">

													@foreach($reservas as $reserva)

														@if($reserva->obtenerPistaHorario($pista->id,$horario->id, $date->now()->addDay(5)->formatLocalized('%Y-%m-%d')) == true && $reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora)

															@if($reserva->contarNumeroJugadores() == 0)

																<a  href="{{ route('reservas.show', $reserva) }}" class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>
																

															@elseif($reserva->contarNumeroJugadores() > 0 || $reserva->contarNumeroJugadores() < 4)

																<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(5)->formatLocalized('%Y-%m-%d'), 'reserva' => $reserva]) }}" class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

															@endif

														@endif

													@endforeach

													@if($horario->obtenerReserva($pista->id,$date->now()->addDay(5)->formatLocalized('%Y-%m-%d')) == false)

														<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(5)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary"><span class="badge badge-light">4</span></a>
														<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
														<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

													@endif

												</span>

											</p>

										@endforeach
													
									</td>
								@endforeach
							</tr>
										
						</tbody>

					</table>

				</div>

				<div class="tab-pane fade" id="dia7" role='tabpanel' arial-labelledby='dia7-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(6)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<table class="table table-bordered">
									
						<thead class="table-dark">
										
							<tr>
											
								@foreach($pistas as $pista)

									<th>
										{{ $pista->name }}
									</th>
										
								@endforeach

							</tr>

						</thead>

						<tbody class="table">
										
							<tr>
								@foreach($pistas as $pista)
									<td>
										@foreach($horarios as $horario)

											<p>
												<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(6)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary">{{ $horario->hora }} </a>

												<span class="btn-group">

													@foreach($reservas as $reserva)

														@if($reserva->obtenerPistaHorario($pista->id,$horario->id, $date->now()->addDay(6)->formatLocalized('%Y-%m-%d')) == true && $reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora)

															@if($reserva->contarNumeroJugadores() == 0)

																<a  href="{{ route('reservas.show', $reserva) }}" class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>
																

															@elseif($reserva->contarNumeroJugadores() > 0 || $reserva->contarNumeroJugadores() < 4)

																<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(6)->formatLocalized('%Y-%m-%d'), 'reserva' => $reserva]) }}" class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></a>
																<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
																<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

															@endif

														@endif

													@endforeach

													@if($horario->obtenerReserva($pista->id,$date->now()->addDay(6)->formatLocalized('%Y-%m-%d')) == false)

														<a href="{{ route('reservas.create',[ 'pista' => $pista, 'horario' => $horario, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(6)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-primary"><span class="badge badge-light">4</span></a>
														<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>
														<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-pencil"></span></a>

													@endif

												</span>

											</p>

										@endforeach
													
									</td>
								@endforeach
							</tr>
										
						</tbody>

					</table>

				</div>
			</div>

		</div>	

	</div>




	<!-- crear un menu para poder ordenar las fechas por fechas, jugador, por quien hace la reserva,-->


	
	


	<div class="row">
		
		@if ($reservas->isNotEmpty())

			<table class="table table-bordered">

				<h2>Todas las reservas</h2>
			
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

				<tbody class="table">
					
					@foreach ($reservas as $reserva)

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
										
										<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-success"><span class="oi oi-eye"></span></a>

										<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>

										<button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>

									</div>
								</form>
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>

		@else

			<p>No hay reservas registradas</p>

		@endif


	</div>

	


	<div class="row">
		
		@if ($reservasCompletas->isNotEmpty())

			<table class="table table-bordered">

				<h2>Reservas completas</h2>
			
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

				<tbody class="table">
					
					@foreach ($reservasCompletas as $reserva)

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
										
										<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-success"><span class="oi oi-eye"></span></a>

										<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>

										<button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>

									</div>
								</form>
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>

		@else

			<p>No hay reservas completas registradas</p>

		@endif


	</div>

	


	<div class="row">
		
		@if ($reservasIncompletas->isNotEmpty())

			<table class="table table-bordered">

				<h2>Reservas incompletas</h2>
			
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

				<tbody class="table">
					
					@foreach ($reservasIncompletas as $reserva)

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
										
										<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-success"><span class="oi oi-eye"></span></a>

										<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning"><span class="oi oi-pencil"></span></a>

										<button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>

									</div>
								</form>
							</td>
						</tr>

					@endforeach

				</tbody>

			</table>

		@else

			<p>No hay reservas incompletas registradas</p>

		@endif

	</div>





@endsection

@section('sidebar')


@endsection