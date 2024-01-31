@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">TORNEO DE FÚTBOL SOFTWARE 2024</h1>
@stop

@section('content')
    <h5 class="text-center">Administrador <b>{{Auth::user()->name}}</b> aquí puedes actualizar tus tablas del torneo</h5>
    
    <div class="row">
        <div class="col-md-4">
            <div>
                <canvas id="myChartIngresosEgresos" width="400" height="400"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <canvas id="myChartGoleadores" width="400" height="400"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <canvas id="myChartPartidos" width="400" height="400"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <canvas id="myChartTarjetas" width="400" height="400"></canvas>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctxIngresosEgresos = document.getElementById('myChartIngresosEgresos');

        new Chart(ctxIngresosEgresos, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Ingresos / Egresos',
                    data: {!! json_encode($ingresosData) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                    
                
                },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxGoleadores = document.getElementById('myChartGoleadores');

        new Chart(ctxGoleadores, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_column($goleadoresData, 'jugador_id')) !!},
                datasets: [{
                    label: 'Goleadores',
                    data: {!! json_encode(array_column($goleadoresData, 'goles')) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        const ctxPartidos = document.getElementById('myChartPartidos');

        new Chart(ctxPartidos, {
            type: 'bar',
            data: {
                labels: ['Ganados', 'Empatados', 'Perdidos'],
                datasets: [{
                    label: 'Partidos',
                    data: {!! json_encode(array_values($partidosData)) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        const ctxTarjetas = document.getElementById('myChartTarjetas');

        new Chart(ctxTarjetas, {
            type: 'bar',
            data: {
                labels: ['Amarillas', 'Rojas'],
                datasets: [{
                    label: 'Tarjetas',
                    data: {!! json_encode([$tarjetasData['amarillas'], $tarjetasData['rojas']]) !!},
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop