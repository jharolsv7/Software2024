@section('title', __('Partidos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Tabla Partidos</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Partidos">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar Nuevo Partido
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.partidos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<th>ID</th> 
								<th>Fecha</th>
								<th>Hora</th>
								<th>Fase del Torneo</th>
								<th>Ubicacion</th>
								<th>Goles Equipo 1</th>
								<th>Goles Equipo 2</th>
								<th>Tarjetas Amarillas</th>
								<th>Tarjetas Rojas</th>
								<th>Equipo Uno</th>
								<th>Equipo Dos</th>
								<th>Ganador</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse($partidos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->fecha }}</td>
								<td>{{ $row->hora }}</td>
								<td>{{ $row->fase->nombre_fase }}</td>
								<td>{{ $row->ubicacion }}</td>
								<td>{{ $row->golesEquipo1 }}</td>
								<td>{{ $row->golesEquipo2 }}</td>
								<td>{{ $row->tarjetaAmarilla }}</td>
								<td>{{ $row->tarjetaRoja }}</td>
								<td>{{ $row->equipo->nombre }}</td>
								<td>{{ $row->equipoDos->nombre }}</td>
								<td>{{ $row->ganador }}</td>
								<td width="90">
									<div class="d-flex justify-content-center">
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-primary rounded d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#updateDataModal" wire:click="edit({{$row->id}})">
												<i class="fa fa-edit me-1"></i> Editar
											</button>
											<button type="button" class="btn btn-sm btn-danger rounded ms-1 d-inline-flex align-items-center" onclick="confirm('Confirm Delete Egreso id {{$row->id}}? \nDeleted Egresos cannot be recovered!') || event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})">
												<i class="fa fa-trash me-1"></i> Eliminar
											</button>
										</div>   
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $partidos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>