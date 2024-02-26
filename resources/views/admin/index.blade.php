@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center"><b>TORNEO DE FÚTBOL SOFTWARE 2024</b></h1>
@stop

@section('content')
    <h5 class="text-center">Administrador <b>{{Auth::user()->name}}</b> aquí puedes ver las Estadísticas del Torneo.</h5>
 
    <style>
    .chart-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 24px;
    }
    
    </style>

    <div class="row">
        <!-- Primer par de gráficos -->
        <div class="col-md-7 chart-container marge">
            <canvas id="myChartIngresosEgresos"></canvas>
        </div>
        <div class="col-md-4 chart-container marge">
            <canvas id="myChartGoleadores"></canvas>
        </div>
    </div>

    <div class="row">
        <!-- Segundo par de gráficos -->
        <div class="col-md-3 chart-container marge">
            <canvas id="myChartProgreso"></canvas>
        </div>
        <div class="col-md-4 chart-container marge">
            <canvas id="myChartPartidos"></canvas>
        </div>
        <div class="col-md-3 chart-container marge">
            <canvas id="myChartTarjetas"></canvas>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctxIngresosEgresos = document.getElementById('myChartIngresosEgresos');

        new Chart(ctxIngresosEgresos, {
            type: 'bar',
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
                labels: {!! json_encode(array_column($goleadoresData, 'nombre')) !!},
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



    const ctxProgreso = document.getElementById('myChartProgreso');

    new Chart(ctxProgreso, {
        type: 'doughnut',
        data: {
            labels: ['Progreso', 'Fin Torneo'],
            datasets: [{
                label: 'Progreso',
                data: {!! json_encode(array_values($progresoData)) !!},
                backgroundColor: [
                    'rgba(0.1, 0.1, 0.1)',
                    'rgba(128, 128, 128, 0.1)'
                ],
                borderColor: [
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
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
                labels: ['Partidos con Victoria', 'Partidos Empatados'],
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