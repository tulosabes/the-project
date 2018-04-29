@extends('admin') 

@section('title', 'Reservas')

@section('content')

	<div class="d-flex justify-content-between align-items-end mb-3">
		
		<h1 class="pb-2">{{ $title }}</h1>

		<div class="btn-group">
			
			<span class="btn btn-danger" id="completas">Completa <span class="badge badge-light">0</span></span>
			<span class="btn btn-warning">Huecos disponibles <span class="badge badge-light">1</span> <span class="badge badge-light">2</span> <span class="badge badge-light">3</span></span>
			<span class="btn btn-primary">Pista libre <span class="badge badge-light">4</span></span>

		</div>

	</div>

	<div class="row justify-content-center">
		
		<div class="col-sm-12">
			
			<ul class="nav nav-tabs bg-dark" role='tablist'>
				<li class="nav-item"><a class="nav-link active" id="dia1-tab" data-toggle='tab' href="#dia1" role='tab' arial-controls='dia1' aria-selected='true'>{{ ucwords($date->now()->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia2-tab" data-toggle='tab' href="#dia2" role='tab' arial-controls='dia2' aria-selected='false'>{{ ucwords($date->now()->addDay(1)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia3-tab" data-toggle='tab' href="#dia3" role='tab' arial-controls='dia3' aria-selected='false'>{{ ucwords($date->now()->addDay(2)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia4-tab" data-toggle='tab' href="#dia4" role='tab' arial-controls='dia4' aria-selected='false'>{{ ucwords($date->now()->addDay(3)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia5-tab" data-toggle='tab' href="#dia5" role='tab' arial-controls='dia5' aria-selected='false'>{{ ucwords($date->now()->addDay(4)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia6-tab" data-toggle='tab' href="#dia6" role='tab' arial-controls='dia6' aria-selected='false'>{{ ucwords($date->now()->addDay(5)->formatLocalized('%A %d')) }}</a></li>
				<li class="nav-item"><a class="nav-link" id="dia7-tab" data-toggle='tab' href="#dia7" role='tab' arial-controls='dia7' aria-selected='false'>{{ ucwords($date->now()->addDay(6)->formatLocalized('%A %d')) }}</a></li>
			</ul>

			<div class="tab-content bg-dark">
				
				<div class="tab-pane fade show active" id="dia1"  role='tabpanel' arial-labelledby='dia1-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->formatLocalized('%A %d- %B -%Y')) }}</p>

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							
							<thead class="table-dark">
										
								<tr>
												
									@foreach($pistas as $pista)

										<th class="col-2">
											{{ $pista->name }}
										</th>
											
									@endforeach

								</tr>

							</thead>

							<tbody class="table">
											
								<tr>
									@foreach($pistas as $pista)
										<td>
											
											@if($pista->verDisponibilidad() == 'Disponible')

												@foreach($horarios as $horario)

													<p class="">
														<span class="btn-group"><span class="btn btn-dark">{{ substr($horario->hora, 0 , -3) }}</span>

															@foreach($reservas as $reserva)

																@if($reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora && $reserva->fecha == $date->now()->formatLocalized('%Y-%m-%d'))

																	@if($reserva->contarNumeroJugadores() == 0)

																		<span class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>


																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>
																		

																	@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)
																		<span class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>

																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>

																	@endif

																@endif

															@endforeach

															@if($horario->obtenerReserva($pista->id,$date->now()->formatLocalized('%Y-%m-%d')) == false)

																<span class="btn btn-primary"><span class="badge badge-light">4</span></span></span>

																<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario->id, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-outline-success"><span class="oi oi-plus"></span></a>

															@endif

													</p>
												
												@endforeach

											@else

												<p class="alert alert-danger">{{ $pista->verDisponibilidad() }}</p>
												<p class="alert alert-danger">{{ $club->obtenerServicio(5) }}</p>

											@endif
														
										</td>
									@endforeach
								</tr>
											
							</tbody>

						</table>
					</div>
				</div>
		
				<div class="tab-pane fade" id="dia2" role='tabpanel' arial-labelledby='dia2-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(1)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
									
							<thead class="table-dark">
											
								<tr>
												
									@foreach($pistas as $pista)

										<th class="col-2">
											{{ $pista->name }}
										</th>
											
									@endforeach

								</tr>

							</thead>

							<tbody class="table">
											
								<tr>
									@foreach($pistas as $pista)
										<td>

											@if($pista->verDisponibilidad() == 'Disponible')

												@foreach($horarios as $horario)

													<p>
														<span class="btn-group"><span class="btn btn-dark">{{ substr($horario->hora, 0 , -3) }}</span>

															@foreach($reservas as $reserva)

																@if($reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora && $reserva->fecha == $date->now()->addDay(1)->formatLocalized('%Y-%m-%d'))

																	@if($reserva->contarNumeroJugadores() == 0)

																		<span class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>


																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>
																		

																	@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)
																		<span class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>

																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>

																	@endif

																@endif

															@endforeach

															@if($horario->obtenerReserva($pista->id,$date->now()->addDay(1)->formatLocalized('%Y-%m-%d')) == false)

																<span class="btn btn-primary"><span class="badge badge-light">4</span></span></span>

																<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario->id, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(1)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-outline-success"><span class="oi oi-plus"></span></a>

															@endif

													</p>

												@endforeach
											
											@else

												<p class="alert alert-danger">{{ $pista->verDisponibilidad() }}</p>
												<p class="alert alert-danger">{{ $club->obtenerServicio(5) }}</p>

											@endif

										</td>
									@endforeach
								</tr>
											
							</tbody>

						</table>
					</div>
				</div>
				
				<div class="tab-pane fade" id="dia3" role='tabpanel' arial-labelledby='dia3-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(2)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
									
							<thead class="table-dark">
											
								<tr>
												
									@foreach($pistas as $pista)

										<th class="col-2">
											{{ $pista->name }}
										</th>
											
									@endforeach

								</tr>

							</thead>

							<tbody class="table">
											
								<tr>
									@foreach($pistas as $pista)
										<td>
											@if($pista->verDisponibilidad() == 'Disponible')

												@foreach($horarios as $horario)

													<p>
														<span class="btn-group"><span class="btn btn-dark">{{ substr($horario->hora, 0 , -3) }}</span>

															@foreach($reservas as $reserva)

																@if($reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora && $reserva->fecha == $date->now()->addDay(2)->formatLocalized('%Y-%m-%d'))

																	@if($reserva->contarNumeroJugadores() == 0)

																		<span class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>


																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>
																		

																	@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)
																		<span class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>

																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>

																	@endif

																@endif

															@endforeach

															@if($horario->obtenerReserva($pista->id,$date->now()->addDay(2)->formatLocalized('%Y-%m-%d')) == false)

																<span class="btn btn-primary"><span class="badge badge-light">4</span></span></span>

																<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario->id, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(2)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-outline-success"><span class="oi oi-plus"></span></a>

															@endif

													</p>

												@endforeach
											
											@else

												<p class="alert alert-danger">{{ $pista->verDisponibilidad() }}</p>
												<p class="alert alert-danger">{{ $club->obtenerServicio(5) }}</p>

											@endif

										</td>
									@endforeach
								</tr>
											
							</tbody>

						</table>
					</div>
				</div>		
				
				<div class="tab-pane fade" id="dia4" role='tabpanel' arial-labelledby='dia4-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(3)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
									
							<thead class="table-dark">
											
								<tr>
												
									@foreach($pistas as $pista)

										<th class="col-2">
											{{ $pista->name }}
										</th>
											
									@endforeach

								</tr>

							</thead>

							<tbody class="table">
											
								<tr>
									@foreach($pistas as $pista)
										<td>
											@if($pista->verDisponibilidad() == 'Disponible')

												@foreach($horarios as $horario)

													<p>
														<span class="btn-group"><span class="btn btn-dark">{{ substr($horario->hora, 0 , -3) }}</span>

															@foreach($reservas as $reserva)

																@if($reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora && $reserva->fecha == $date->now()->addDay(3)->formatLocalized('%Y-%m-%d'))

																	@if($reserva->contarNumeroJugadores() == 0)

																		<span class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>


																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>
																		

																	@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)
																		<span class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>

																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>

																	@endif

																@endif

															@endforeach

															@if($horario->obtenerReserva($pista->id,$date->now()->addDay(3)->formatLocalized('%Y-%m-%d')) == false)

																<span class="btn btn-primary"><span class="badge badge-light">4</span></span></span>

																<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario->id, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(3)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-outline-success"><span class="oi oi-plus"></span></a>

															@endif

													</p>

												@endforeach

											@else

												<p class="alert alert-danger">{{ $pista->verDisponibilidad() }}</p>
												<p class="alert alert-danger">{{ $club->obtenerServicio(5) }}</p>

											@endif
														
										</td>
									@endforeach
								</tr>
											
							</tbody>

						</table>
					</div>
				</div>
				
				<div class="tab-pane fade" id="dia5" role='tabpanel' arial-labelledby='dia5-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(4)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
									
							<thead class="table-dark">
											
								<tr>
												
									@foreach($pistas as $pista)

										<th class="col-2">
											{{ $pista->name }}
										</th>
											
									@endforeach

								</tr>

							</thead>

							<tbody class="table">
											
								<tr>
									@foreach($pistas as $pista)
										<td>
											@if($pista->verDisponibilidad() == 'Disponible')

												@foreach($horarios as $horario)

													<p>
														<span class="btn-group"><span class="btn btn-dark">{{ substr($horario->hora, 0 , -3) }}</span>

															@foreach($reservas as $reserva)

																@if($reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora && $reserva->fecha == $date->now()->addDay(4)->formatLocalized('%Y-%m-%d'))

																	@if($reserva->contarNumeroJugadores() == 0)

																		<span class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>


																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>
																		

																	@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)
																		<span class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>

																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>

																	@endif

																@endif

															@endforeach

															@if($horario->obtenerReserva($pista->id,$date->now()->addDay(4)->formatLocalized('%Y-%m-%d')) == false)

																<span class="btn btn-primary"><span class="badge badge-light">4</span></span></span>

																<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario->id, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(4)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-outline-success"><span class="oi oi-plus"></span></a>

															@endif
													</p>

												@endforeach

											@else

												<p class="alert alert-danger">{{ $pista->verDisponibilidad() }}</p>
												<p class="alert alert-danger">{{ $club->obtenerServicio(5) }}</p>

											@endif
														
										</td>
									@endforeach
								</tr>
											
							</tbody>

						</table>
					</div>
				</div>
				
				<div class="tab-pane fade" id="dia6" role='tabpanel' arial-labelledby='dia6-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(5)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
									
							<thead class="table-dark">
											
								<tr>
												
									@foreach($pistas as $pista)

										<th class="col-2">
											{{ $pista->name }}
										</th>
											
									@endforeach

								</tr>

							</thead>

							<tbody class="table">
											
								<tr>
									@foreach($pistas as $pista)
										<td>
											@if($pista->verDisponibilidad() == 'Disponible')

												@foreach($horarios as $horario)

													<p>
														<span class="btn-group"><span class="btn btn-dark">{{ substr($horario->hora, 0 , -3) }}</span>

															@foreach($reservas as $reserva)

																@if($reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora && $reserva->fecha == $date->now()->addDay(5)->formatLocalized('%Y-%m-%d'))

																	@if($reserva->contarNumeroJugadores() == 0)

																		<span class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>


																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>
																		

																	@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)
																		<span class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>

																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>

																	@endif

																@endif

															@endforeach

															@if($horario->obtenerReserva($pista->id,$date->now()->addDay(5)->formatLocalized('%Y-%m-%d')) == false)

																<span class="btn btn-primary"><span class="badge badge-light">4</span></span></span>

																<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario->id, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(5)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-outline-success"><span class="oi oi-plus"></span></a>

															@endif

													</p>

												@endforeach

											@else

												<p class="alert alert-danger">{{ $pista->verDisponibilidad() }}</p>
												<p class="alert alert-danger">{{ $club->obtenerServicio(5) }}</p>

											@endif
														
										</td>
									@endforeach
								</tr>
											
							</tbody>

						</table>
					</div>
				</div>

				<div class="tab-pane fade" id="dia7" role='tabpanel' arial-labelledby='dia7-tab'>
					
					<h3>Hora y pista a elegir</h3>

					<p>{{ ucwords($date->now()->addDay(6)->formatLocalized('%A %d- %B -%Y')) }}</p>

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
									
							<thead class="table-dark">
											
								<tr>
												
									@foreach($pistas as $pista)

										<th class="col-2">
											{{ $pista->name }}
										</th>
											
									@endforeach

								</tr>

							</thead>

							<tbody class="table">
											
								<tr>
									@foreach($pistas as $pista)
										<td>
											@if($pista->verDisponibilidad() == 'Disponible')

												@foreach($horarios as $horario)

													<p>
														<span class="btn-group"><span class="btn btn-dark">{{ substr($horario->hora, 0 , -3) }}</span>

															@foreach($reservas as $reserva)

																@if($reserva->obtenerPista() == $pista->name && $reserva->obtenerHorario() == $horario->hora && $reserva->fecha == $date->now()->addDay(6)->formatLocalized('%Y-%m-%d'))

																	@if($reserva->contarNumeroJugadores() == 0)

																		<span class="btn btn-danger"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>


																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>
																		

																	@elseif($reserva->contarNumeroJugadores() > 0 && $reserva->contarNumeroJugadores() < 4)
																		<span class="btn btn-warning"><span class="badge badge-light">{{ $reserva->contarNumeroJugadores() }}</span></span></span>

																		<form action="{{ route('reservas.destroy', $reserva) }}" method="POST">


																			{!! csrf_field() !!} 

																			{{ method_field('DELETE') }} 

																			<div class="btn-group">
																				
																				<a href="{{ route('reservas.show', $reserva) }}" class="btn btn-outline-primary"><span class="oi oi-eye"></span></a>

																				<a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>

																				<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>

																			</div>
																		</form>

																	@endif

																@endif

															@endforeach

															@if($horario->obtenerReserva($pista->id,$date->now()->addDay(6)->formatLocalized('%Y-%m-%d')) == false)

																<span class="btn btn-primary"><span class="badge badge-light">4</span></span></span>

																<a href="{{ route('reservas.create', [ 'pista' => $pista, 'horario' => $horario->id, 'id_hace_reserva' => Auth::user(), 'fecha' => $date->now()->addDay(6)->formatLocalized('%Y-%m-%d')]) }}" class="btn btn-outline-success"><span class="oi oi-plus"></span></a>

															@endif

													</p>

												@endforeach
											
											@else

												<p class="alert alert-danger">{{ $pista->verDisponibilidad() }}</p>
												<p class="alert alert-danger">{{ $club->obtenerServicio(5) }}</p>

											@endif
														
										</td>
									@endforeach
								</tr>
											
							</tbody>

						</table>
					</div>
				</div>
			</div>

		</div>	

	</div>




	<!-- crear un menu para poder ordenar las fechas por fechas, jugador, por quien hace la reserva,-->


	
	


	<!--<div class="row">
		
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


-->


@endsection

@section('sidebar')


@endsection