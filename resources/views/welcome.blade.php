<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Software 2024 Tournament</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Styles -->
   
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');
    
    .custom-container {
        
        position: relative;
        background-image: url('/img/login.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        height: 700px; /* Adjust the height as needed */
        border-bottom: 4px solid gold; /* Add a gold border at the bottom */
    }

    .text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
        color: white;
    }

    .hover-item {
        cursor: pointer;
    }

    .link-container {
        display: inline-block;
        padding: 30px;
        transition: background-color 0.3s, color 0.3s;
    }

    .link-container:hover {
    background-color: #3498db; /* Azul claro al hacer hover */
    color: #fff;
}

    .link-container a {
        color: #fff;
        text-decoration: none;
    }

    .custom-border {
        border-top: 2px solid gold;
        border-bottom: 4px solid gold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.4);
    }

    .login-section {
        /* Add styles as needed */
    }

    .custom-container h1 {
    font-family: 'Righteous', sans-serif;
    font-size: 3rem;
    color: gold;
    text-shadow: 2px 2px 2px black; /* Desplazamiento horizontal, desplazamiento vertical, desenfoque y color */
}
.golden-title {
        
            padding: 8px;
            border-radius: 8px;
            color: gold;
            text-shadow: 1px 1px 1px white; /* Desplazamiento horizontal, desplazamiento vertical, desenfoque y color */

        }
</style>

</head>
<body class="antialiased bg-black">
    <!--ENCABEZADO -->
    <div class="custom-container antialiased bg-no-repeat bg-cover bg-center bg-fixed">
        <div class="custom-border flex items-center justify-between px-5 py-1 bg-gray-900 bg-opacity-75">
            <div class="">
                <img src="/img/ball.png" alt="Logo" class="w-50 h-20 rounded">
            </div>
            <div class="ml-10">
                <ul class="list-none flex items-left">
                    <li class="hover-item">
                        <div class="link-container">
                            <a href="{{ url('/') }}">INICIO</a>
                        </div>
                    </li>
                    <li class="hover-item">
                        <div class="link-container">
                            <a href="/img/REGLAS.pdf" download="reglas_del_torneo.pdf">DESCARGAR REGLAS</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="login-section flex items-center">
                <a href="{{ route('login') }}" class="text-white hover:text-red-800 font-semibold transition duration-300 focus:outline-none focus:ring focus:border-blue-300">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-white hover:text-blue-500 font-semibold transition duration-300 focus:outline-none focus:ring focus:border-blue-300 ml-4">Register</a>
                @endif
            </div>
        </div>
        <br>
        <!--PRIMERA SECCIÓN-->

       
<!--PRIMERA SECCIÓN-->

<div class="text-center text-3xl font-extrabold text-white mt-48">
            <h1>TORNEO DE FÚTBOL SOFTWARE 2024</h1>
        </div>
    </div>
    

    <!--SEGUNDA SECCIÓN-->
    <!--SEGUNDA SECCIÓN-->
    <div class="flex justify-center items-center px-5 py-10 mx-auto bg-sky-blue-400 text-white">
        <div class="max-w-lg mx-auto">
                
        </div>
    </div>

    <!-- TERCERA SECCIÓN -->
    <div class="table-responsive flex justify-center p-5">
        <!-- Tabla Grupo A -->
        <div class="mr-4">
            <h2 class="text-2xl font-bold mb-4 text-white text-center golden-title">Tabla de Posiciones Grupo A</h2>
            @livewire('equipos-table', ['grupo' => 'A'])
        </div>
        <!-- Tabla Grupo B -->
        <div class="ml-4">
            <h2 class="text-2xl font-bold mb-4 text-white text-center golden-title">Tabla de Posiciones Grupo B</h2>
            @livewire('equipos-table', ['grupo' => 'B'])
        </div>
    </div>

    <!--CUARTA SECCIÓN-->
    <div class="flex justify-center p-5">
        <div class="mr-4">
            <h2 class="text-2xl font-bold mb-4 text-white text-center golden-title">Tabla de Goleadores</h2>
            @livewire('goleadores-table')
        </div>
        <div class="ml-4">
            <h2 class="text-2xl font-bold mb-4 text-white text-center golden-title">Próximos Encuentros</h2>
            @livewire('partidos-table')
        </div>
    </div>
    <br>
    <!-- Texto centrado debajo de la imagen -->
    <div class="text-center mt-4" style="color: white;">
        <p class="text-justify" style="margin: 70px;">La Carrera de Software de la Escuela Politécnica del Ejército (ESPE-L) organizó un emocionante torneo de fútbol que reunió a estudiantes, profesores y personal administrativo en un ambiente de camaradería y competencia deportiva. El evento, diseñado para fomentar el espíritu deportivo y fortalecer los lazos entre los miembros de la comunidad universitaria, contó con equipos representativos de diferentes niveles académicos.</p>
    </div>
     <!--QUINTA SECCIÓN-->
     <div class="footer bg-gradient-to-r from-blue-500 to-blue-800 p-5 text-center text-white">
    <p>Derechos reservados © 2024 - (G4) DESARROLLO WEB AVANZADO SW</p>
</div>
    
    </html>
