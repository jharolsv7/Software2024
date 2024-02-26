@section('title', __('Goleadores'))
<div class="container-fluid">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h4><i class="fas fa-file-export"></i> TOP 10 Mejores Goleadores</h4>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('informe.generarPDFGoleadores') }}" class="btn btn-success">
                            <i class="fas fa-download"></i> Descargar Reporte
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    @include('livewire.goleadores.modals')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr> 
                                    <th>TOP</th> 
                                    <th>Jugador</th>
                                    <th>Equipo</th>
                                    <th>Goles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($goleadores as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> 
                                    <td>{{ $row->jugador->nombre }}</td>
                                    <td>{{ $row->jugador->equipo->nombre }}</td>
                                    <td>{{ $row->goles }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="4">Sin Datos</td>
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
