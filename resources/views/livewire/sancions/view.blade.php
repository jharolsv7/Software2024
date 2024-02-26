@section('title', __('Partidos'))
<div class="container-fluid">
	<br>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-bookmark"></i>
							Registro de Resultados por Vocalía</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Partidos">
						</div>
					</div>
				</div>
				<div class="card-body">
					@include('livewire.sancions.modals')
					@php $partidosCount = $partidos->count(); @endphp
					@for($i = 0; $i < $partidosCount; $i += 3)
						<div class="row">
							@for($j = $i; $j < min($i + 3, $partidosCount); $j++)
								@php $row = $partidos[$j]; @endphp
								<div class="col-md-4">
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title"><strong>ID del Partido:</strong> {{ $row->id }}</h5>
        </div>
        <div class="card-body">
            <strong>Fecha:</strong> {{ $row->fecha }}<br>
            <strong>Hora:</strong> {{ $row->hora }}<br>
            <strong>Fase del Torneo:</strong> {{ $row->fase->nombre_fase }}<br>
            <strong>Goles Equipo 1:</strong> {{ $row->golesEquipo1 }}<br>
            <strong>Goles Equipo 2:</strong> {{ $row->golesEquipo2 }}<br>
            <strong>Tarjetas Amarillas:</strong> {{ $row->tarjetaAmarilla }}<br>
            <strong>Tarjetas Rojas:</strong> {{ $row->tarjetaRoja }}<br>
            <strong>Equipo Uno:</strong> {{ $row->equipo->nombre }}<br>
            <strong>Equipo Dos:</strong> {{ $row->equipoDos->nombre }}<br>
            <strong>Ganador:</strong> {{ $row->ganador }}<br><br>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-lg btn-success rounded d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#updateDataModal" wire:click="edit({{$row->id}})">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </button>
            </div>
        </div>
    </div>
</div>
							@endfor
						</div>
					@endfor
					@if($partidos->isEmpty())
						<p class="text-center">No se encontraron partidos.</p>
					@endif
					<div class="float-end">{{ $partidos->links() }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
