<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
            height: 700px; /* Ajusta la altura según sea necesario */
            border-bottom: 4px solid gold; /* Agrega un borde dorado en la parte inferior */
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
            padding: 10px;
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
            /* Agrega estilos según sea necesario */
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

        /* Ajustes de responsividad */
        @media (max-width: 600px) {
            .text-overlay {
                padding: 8px;
            }
            .custom-container h1 {
                font-size: 1.5rem;
            }
            .text-center.text-3xl {
                font-size: 1.5rem;
            }
            .text-2xl {
                font-size: 1.25rem;
            }
            .link-container {
                padding: 8px;
            }
            .table-responsive {
                max-width: 100%; /* Ajusta el ancho máximo de la tabla en pantallas pequeñas */
            }
            .table-responsive .mr-4, .table-responsive .ml-4 {
                margin: 0 !important; /* Quita el margen de las tablas en pantallas pequeñas */
            }
            .table-responsive div {
                width: 100%; /* Ajusta el ancho de los contenedores de las tablas en pantallas pequeñas */
            }
            .large-screen {
                display: none; /* Oculta la sección para pantallas pequeñas */
            }
        }

        @media (min-width: 601px) {
            .small-screen {
                display: none; /* Oculta la sección para pantallas grandes */
            }
        }
    </style>
</head>
<body class="antialiased bg-black">
    <!--ENCABEZADO -->
    <div class="custom-container antialiased bg-no-repeat bg-cover bg-center bg-fixed">
        <div class="custom-border flex flex-col md:flex-row items-center justify-between px-5 py-1 bg-gray-900 bg-opacity-75">
            <div class="mb-4 md:mb-0">
                <img src="/img/ball.png" alt="Logo" class="w-32 md:w-50 h-auto rounded">
            </div>
            <div class="md:ml-10">
                <ul class="list-none flex flex-col md:flex-row items-center">
                    <li class="hover-item mb-2 md:mb-0 md:mr-4">
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
        <div class="text-center text-3xl font-extrabold text-white mt-48">
            <h1>TORNEO DE FÚTBOL SOFTWARE 2024</h1>
        </div>
    </div>
    
    <!--SEGUNDA SECCIÓN-->
    <div class="flex justify-center items-center px-5 py-10 md:px-0 md:py-20 mx-auto bg-sky-blue-400 text-white">
        <div class="max-w-lg mx-auto">
            <!-- Contenido de la segunda sección según sea necesario -->
        </div>
    </div>

    <!-- TERCERA SECCIÓN -->
    <div class="table-responsive flex justify-center p-5 large-screen">
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

    <!-- CUARTA SECCIÓN PARA PANTALLAS PEQUEÑAS -->
    <div class="table-responsive small-screen">
        <div class="flex justify-center p-5">
            <!-- Tabla Grupo A -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-white text-center golden-title">Tabla de Posiciones Grupo A</h2>
                @livewire('equipos-table', ['grupo' => 'A'])
            </div>
        </div>
        <div class="flex justify-center p-5">
            <!-- Tabla Grupo B -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-white text-center golden-title">Tabla de Posiciones Grupo B</h2>
                @livewire('equipos-table', ['grupo' => 'B'])
            </div>
        </div>
    </div>

    <!-- QUINTA SECCIÓN -->
    <div class="flex justify-center p-5">
        <div class="mr-4">
            <h2 class="text-2xl font-bold mb-4 text-white text-center golden-title">Tabla de Goleadores</h2>
            @livewire('goleadores-table')
        </div>
    </div>

    <!-- SEXTA SECCIÓN -->
    <div class="flex justify-center p-5">
        <div class="ml-4">
            <h2 class="text-2xl font-bold mb-4 text-white text-center golden-title">Próximos Encuentros</h2>
            @livewire('partidos-table')
        </div>
    </div>

    <!-- Texto centrado debajo de la imagen -->
    <div class="text-center mt-4" style="color: white;">
        <p class="text-justify" style="margin: 70px;">La Carrera de Software de la Escuela Politécnica del Ejército (ESPE-L) organizó un emocionante torneo de fútbol que reunió a estudiantes, profesores y personal administrativo en un ambiente de camaradería y competencia deportiva. El evento, diseñado para fomentar el espíritu deportivo y fortalecer los lazos entre los miembros de la comunidad universitaria, contó con equipos representativos de diferentes niveles académicos.</p>
    </div>

    <!-- SÉPTIMA SECCIÓN -->
    <div class="footer bg-gradient-to-r from-blue-500 to-blue-800 p-5 text-center text-white">
        <p>Derechos reservados © 2024 - (G4) DESARROLLO WEB AVANZADO SW</p>
    </div>
</body>
</html>