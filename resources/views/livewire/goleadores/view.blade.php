@section('title', __('Goleadores'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Goleadore Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Goleadores">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar Goleadores
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.goleadores.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<th>ID</th> 
								<th>Partido</th>
								<th>Jugador</th>
								<th>Goles</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse($goleadores as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>
									<div class="row">
										<div class="col-md-4">
											{{ $row->partido->equipo->nombre }} vs {{ $row->partido->equipoDos->nombre }}
										</div>
										<div class="col-md-4">
											{{ $row->partido->fase->nombre_fase }}
										</div>
										<div class="col-md-4">
											{{ $row->partido->fecha }}
										</div>
									</div>
								</td>
								<td>{{ $row->jugador->nombre }}</td>
								<td>{{ $row->goles }}</td>
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
					<div class="float-end">{{ $goleadores->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>