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
    </head>
    <body class="antialiased bg-no-repeat bg-cover bg-center bg-fixed" style="background-image: url('/img/fondo-home.jpg');">
        <!--ENCABEZADO -->
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

            <!-- Estilos del Navbar -->
            <style>
                .hover-item {
                    cursor: pointer;
                }

                .link-container {
                    display: inline-block;
                    padding: 30px;
                    transition: background-color 0.3s, color 0.3s;
                }

                .link-container:hover {
                    background-color: #A6A6A6; /* Cambiar al color deseado cuando se pasa el ratón */
                    color: #fff; /* Cambiar al color deseado cuando se pasa el ratón */
                }

                .link-container a {
                    color: #fff; /* Color de texto blanco */
                    text-decoration: none; /* Quitar subrayado */
                }

                .custom-border {
                    border-top: 2px solid white; /* Ajusta el grosor del borde superior */
                    border-bottom: 4px solid white; /* Ajusta el grosor del borde inferior */
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.4); /* Sombreado con color negro y opacidad */
                }

            </style>

            <div class="login-section flex items-center">
                <a href="{{ route('login') }}" class="text-white hover:text-red-800 font-semibold transition duration-300 focus:outline-none focus:ring focus:border-blue-300">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-white hover:text-blue-500 font-semibold transition duration-300 focus:outline-none focus:ring focus:border-blue-300 ml-4">Register</a>
                @endif
            </div>
        </div>
        <br>
        <!--PRIMERA SECCIÓN-->
            <div class="text-center text-3xl font-extrabold text-white">
                <h1>TORNEO DE FÚTBOL SOFTWARE 2024</h1>
            </div>

        <!--SEGUNDA SECCIÓN-->
        <!--SEGUNDA SECCIÓN-->
        <div class="flex justify-center items-center px-5 py-10 mx-auto bg-sky-blue-400 text-white">
            <div class="max-w-lg mx-auto">
                <!-- Imagen que ocupa todo el ancho -->
                <div class="w-full h-64 relative overflow-hidden transition-transform transform origin-center hover:scale-105 ease-in-out duration-300">
                    <img src="/img/Espe-Latacunga.jpg" alt="Descripción de la imagen" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                
                <!-- Texto centrado debajo de la imagen -->
                <div class="text-center mt-4">
                    <h1 class="text-green-400 dark:text-sky-400 text-2xl font-bold">UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE-L</h1>
                    <h2 class="text-sky-500 dark:text-sky-400 text-lg font-bold">INGENIERÍA DE SOFTWARE</h2>
                    <p class="text-justify">La Carrera de Software de la Escuela Politécnica del Ejército (ESPE-L) organizó un emocionante torneo de fútbol que reunió a estudiantes, profesores y personal administrativo en un ambiente de camaradería y competencia deportiva. El evento, diseñado para fomentar el espíritu deportivo y fortalecer los lazos entre los miembros de la comunidad universitaria, contó con equipos representativos de diferentes niveles académicos.</p>
                </div>
            </div>
        </div>

        <!-- TERCERA SECCIÓN -->
        <div class="table-responsive flex justify-center p-5">
            <!-- Tabla Grupo A -->
            <div class="mr-4">
                <h2 class="text-2xl font-bold mb-4 text-white text-center">Tabla de Posiciones Grupo A</h2>
                @livewire('equipos-table', ['grupo' => 'A'])
            </div>
            <!-- Tabla Grupo B -->
            <div class="ml-4">
                <h2 class="text-2xl font-bold mb-4 text-white text-center">Tabla de Posiciones Grupo B</h2>
                @livewire('equipos-table', ['grupo' => 'B'])
            </div>
        </div>

        <!--CUARTA SECCIÓN-->
        <div class="flex justify-center p-5">
            <div class="mr-4">
                <h2 class="text-2xl font-bold mb-4 text-white text-center">Tabla de Goleadores</h2>
                @livewire('jugadors-table')
            </div>
            <div class="ml-4">
                <h2 class="text-2xl font-bold mb-4 text-white text-center">Próximos Encuentros</h2>
                @livewire('partidos-table')
            </div>
        </div>
        <br>

        

        <!--QUINTA SECCIÓN-->
        <div class="footer bg-gray-900 p-5 text-center text-white">
            <p>Derechos reservados © 2024 - (G4) DESARROLLO WEB AVANZADO SW</p>
        </div>
    </body>
    
    </html>






    