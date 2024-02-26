@extends('adminlte::page')
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h4><i class="fas fa-file-export"></i> Lista de Equipos</h4>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('informe.generarPDF') }}" class="btn btn-success">
                            <i class="fas fa-download"></i> Descargar Reporte
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($equipos as $equipo)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    @if($equipo->logo)
                                        <img src="{{ asset('storage/' . $equipo->logo) }}" alt="Logo" class="w-25 me-3 rounded-circle">
                                    @else
                                        <p>No Logo</p>
                                    @endif
                                    <h5>{{ $equipo->nombre }}</h5>
                                </div>
                            </div>
                                <div class="card-body">
                                    <p><strong>ID:</strong> {{ $equipo->id }}</p>
                                    <p><strong>Puntos:</strong> {{ $equipo->puntos }}</p>
                                    <p><strong>Goles a Favor:</strong> {{ $equipo->goles_a_favor }}</p>
                                    <p><strong>Goles en Contra:</strong> {{ $equipo->goles_en_contra }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <p class="text-center">Sin Equipos</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">{{ $equipos->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
