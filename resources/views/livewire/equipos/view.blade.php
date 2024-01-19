@section('title', __('Equipos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Tabla Equipos</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Equipos">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar Nuevo Equipo
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.equipos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<th>ID</th> 
								<th>Nombre</th>
								<th>Logo</th>
								<th>Eslogan</th>
								<th>Nombre de la Madrina</th>
								<th>Monto de Inscripcion</th>
								<th>Puntos</th>
								<th>Grupo</th>
								<th>Goles a Favor</th>
								<th>Goles en Contra</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody class= "tbody text-center">
							@forelse($equipos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->logo }}</td>
								<td>{{ $row->eslogan }}</td>
								<td>{{ $row->nombreMadrina }}</td>
								<td>{{ $row->inscripcionMonto }}</td>
								<td>{{ $row->puntos }}</td>
								<td>{{ $row->grupo }}</td>
								<td>{{ $row->goles_a_favor }}</td>
								<td>{{ $row->goles_en_contra }}</td>
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
								<td class="text-center" colspan="100%">Sin Datos</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $equipos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>