@extends('admin') 

@section('title', 'Perfil administrador')

@section('content')

<dic class="container-fluid">

		<div class="row justify-content-center"> 

				<div class="col-sm-12 col-md-12">
						
					<h1 class="pb-2">{{ $title }}</h1>
			
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							
							<thead class="table-dark">
									
								<tr>
									<th class="col-sm-2">Nombre</th>
									<th class="col-sm-3">Email</th>
									<th class="col-sm-1">Teléfono</th>
									<th class="col-sm-1">Nivel</th>
									<th class="col-sm-1">Población</th>
									<th class="col-sm-1">Provincia</th>
									<th class="col-sm-1">Editar</th>
								</tr>
				
							</thead>
				
							<tbody class="table">
									
								<tr>
									<td>{{ $admin->name }}</td>
									<td>{{ $admin->email }}</td>
									<td>{{ $admin->telefono }}</td>
									<td>{{ $admin->obtenerNivel() }}</td>
									<td>{{ $admin->obtenerPoblacion() }}</td>
									<td>{{ $admin->obtenerProvincia() }}</td>
									<td class="text-center">
										<a href="{{ route('perfiles.edit', $admin) }}" class="btn btn-outline-warning"><span class="oi oi-pencil"></span></a>
									</td>
								</tr>
				
							</tbody>
				
						</table>
					</div>
				</div>
			</div>

</dic>

@endsection

@section('sidebar')


@endsection

 