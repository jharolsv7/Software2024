@section('title', __('Sancionjugadors'))

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h4><i class="fas fa-file-export"></i> Informe de Sanción del Jugador</h4>
                </div>
                <div class="float-right">
                    <a href="{{ route('informe.generarPDFSancionJugador') }}" class="btn btn-success">
                        <i class="fas fa-download"></i> Descargar Reporte
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($sancionjugadors as $sancionjugador)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ $sancionjugador->jugador->nombre }}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>ID:</strong> {{ $sancionjugador->id }}</p>
                                <p><strong>Detalles:</strong> {{ $sancionjugador->detalles }}</p>
                                <p><strong>Fecha:</strong> {{ $sancionjugador->fecha }}</p>
                                <p><strong>Monto:</strong> {{ $sancionjugador->monto }}</p>
                                <p><strong>Estado:</strong>
                                    @if($sancionjugador->estado == 1)
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
                        <p class="text-center">No hay sanciones registradas para jugadores.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>       
</div>
