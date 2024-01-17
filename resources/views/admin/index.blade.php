@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">TORNEO DE FÚTBOL SOFTWARE 2024</h1>
@stop

@section('content')
    <h5 class="text-center">Administrador <b>{{Auth::user()->name}}</b> aquí puedes actulizar tus tablas del torneo</h5>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


