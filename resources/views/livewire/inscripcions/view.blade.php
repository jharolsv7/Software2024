@section('title', __('Inscripcions'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Inscripcion de Equipo </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Inscripcions">
						</div>
						<!-- <div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Inscribir un Equipo
						</div> -->
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.inscripcions.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<th>ID</th>
								<th>Equipo</th> 
								<th>Monto</th>
								<th>Fecha</th>
								<th>Descripcion</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse($inscripcions as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->equipo->nombre }}</td> 
								<td>{{ $row->monto }}</td>
								<td>{{ $row->fecha }}</td>
								<td>{{ $row->descripcion }}</td>
								<td>
									@if($row->estado == 1)
										<span class="text-green">Inscripción Activa</span>
									@else
										<span class="text-red">Inscripción Inactiva</span>
									@endif
								</td>
								<td width="90">
									<div class="d-flex justify-content-center">
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-primary rounded d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#updateDataModal" wire:click="edit({{$row->id}})">
												<i class="fa fa-edit me-1"></i> Actualizar Inscripcion
											</button>
											<!-- <button type="button" class="btn btn-sm btn-danger rounded ms-1 d-inline-flex align-items-center" onclick="confirm('Confirm Delete Egreso id {{$row->id}}? \nDeleted Egresos cannot be recovered!') || event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})">
												<i class="fa fa-trash me-1"></i> Eliminar
											</button> -->
										</div>   
									</div>
								</td>
							</tr>

							@if(session('error'))
								<div class="alert alert-danger" style="position: fixed; top: 20px; right: 20px; z-index: 9999;" id="errorAlert">
									{{ session('error') }}
								</div>

								<script>
									// Cerrar la alerta después de 7 segundos
									setTimeout(function() {
										document.getElementById('errorAlert').style.display = 'none';
									}, 4000);

									// Eliminar la alerta al hacer clic en el botón "Guardar"
									document.addEventListener('livewire:load', function () {
										Livewire.on('cerrarAlerta', function () {
											document.getElementById('errorAlert').style.display = 'none';
										});
									});
								</script>
							@endif

							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $inscripcions->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>