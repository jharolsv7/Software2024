@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Hola Administrador</h1>
@stop

@section('content')
    <p>Aqui puedes actulizar tus tablas del Torneo de Futbol Softtware 2024</p>

    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('ingresos')
        </div>     
    </div>   
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

