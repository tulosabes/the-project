@extends('admin') 

@section('title', 'Pistas')

@section('content')

	<div class="row justify-content-center">
		
		<div class=" col-sm-12 col-md-12 col-lg-8">
			<div class="d-flex justify-content-between align-items-end mb-3">
		
				<h1 class="pb-2">{{ $title }}</h1>
			
			</div>
			
				@if ($pistas->isNotEmpty())
			
					<div class="table-responsive">

						<table class="table table-bordered table-striped table-hover">
						
							<thead class="table-dark justify-content-center">
								<tr>
									<th class="col-sm-3">Nombre</th>
									<th class="col-sm-5">Descripción</th>
									<th class="col-sm-3">Disponibilidad</th>
									<th class="col-sm-1">Editar</th>
								</tr>
						
								</thead>
						
								<tbody class="table">
										
								@foreach ($pistas as $pista)
						
									<tr>
										<td class="col-sm-3">{{ $pista->name }}</td>
										<td class="col-sm-5">{{ $pista->descripcion }}</td>
										<td class="col-sm-3">{{ $pista->VerDisponibilidad() }}</td>
										<td class="col-sm-1">
										<a href="{{ route('pistas.edit', $pista) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>
									</td>
								</tr>
						
							@endforeach
						
						</tbody>
						
					</table>
			
				</div>
			
				@else
			
					<p>No hay pistas registradas</p>
			
				@endif
		</div>	

	</div>
@endsection

@section('sidebar')


@endsection
