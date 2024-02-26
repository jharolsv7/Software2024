@section('title', __('Sancionequipos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h4><i class="fas fa-file-export"></i> Lista de Equipos con Sanción</h4>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('informe.generarPDFSancionEquipor') }}" class="btn btn-success">
                            <i class="fas fa-download"></i> Descargar Reporte
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        @forelse($sancionequipos as $sancion)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        @if($sancion->equipo->logo)
                                            <img src="{{ asset('storage/' . $sancion->equipo->logo) }}" alt="Logo" class="w-25 me-3 rounded-circle">
                                        @else
                                            <p>No Logo</p>
                                        @endif
                                        <h5>{{ $sancion->equipo->nombre }}</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p><strong>ID de la Sanción:</strong> {{ $sancion->equipo->id }}</p>
                                    <p><strong>Detalles:</strong> {{ $sancion->detalles }}</p>
                                    <p><strong>Fecha:</strong> {{ $sancion->fecha }}</p>
                                    <p><strong>Monto:</strong> {{ $sancion->monto }}</p>
                                    <p><strong>Estado:</strong>
                                        @if($sancion->estado == 1)
                                            <span class="text-green">Sanción Activa</span>
                                        @else
                                            <span class="text-red">Sanción Inactiva</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <p class="text-center">Sin Sanciones de Equipos</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>			
		</div>
	</div>
</div>