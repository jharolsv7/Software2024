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
                            <a href="#">INICIO</a>
                        </div>
                    </li>
                    <li class="hover-item">
                    <div class="link-container">
                        <a href="/img/REGLAS.pdf" download="reglas_del_torneo.pdf">REGLAS</a>
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
        <br>
        <!--SEGUNDA SECCIÓN-->
        <div class="flex px-5">
            <div class="w-full relative overflow-hidden transition-transform transform origin-center hover:scale-105 ease-in-out duration-300">
                <img src="/img/Espe-Latacunga.jpg" alt="ESPE Ext-Belisario Quevedo" class="w-full h-64 px-5">
            </div>
            <div class="w-full bg-sky-blue-400 p-5 space-y-2 text-center text-white">
                <h1 class="text-green-400 dark:text-sky-400 text-xl font-bold">UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE-L</h1>
                <h2 class="text-sky-500 dark:text-sky-400 text-lg font-bold">INGENIERÍA DE SOFTWARE</h2>
                <p class="text-justify font-bold font-sans">La Carrera de Software de la Escuela Politécnica del Ejército (ESPE-L) organiza un 
                    emocionante torneo de fútbol que reunió a estudiantes y profesores en un ambiente de diversión y competencia deportiva. 
                    El evento, diseñado para fomentar el espíritu deportivo y fortalecer los lazos entre los miembros de la comunidad 
                    universitaria, cuenta con equipos representativos de diferentes niveles académicos.
                </p>
            </div>
        </div>
        <br>
        

    <style>
        .carousel {
            overflow: hidden;
            width: 100%;
            height: 100%;
            max-width: 900px;
            max-height: 600px;
            margin: 0 auto; /* Centrar en la pantalla */
            position: relative;
            background-size: cover;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
            position: relative;
        }

        .carousel-item {
            min-width: 100%; /* Cada item ocupa el 100% del contenedor */
            min-height: 100%;
            position: relative;
        }

        .carousel-image {
            width: 100%;
            height: 100%; /* Ajusta el alto según tus necesidades */     
        }   

        .text-container {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            text-align: center;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border: none;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }
    </style>

    
        <div class="text-center text-3xl font-extrabold text-blue-500 py-5">
            <h1>EQUIPOS PARTICIPANTES</h1>
        </div>

        <!--Sección CARRUSEL DE IMAGENES-->
    <div class="">    
        <div class="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="https://cdn.conmebol.com/wp-content/uploads/2023/10/IMG_3621-1024x683.jpg" alt="" class="carousel-image">
                        <div class="text-container">
                            <div class="text-3xl font-extrabold">LDU QUITO</div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://imagenes.elpais.com/resizer/oYC3PxTQ8YwNGvhR09-RnFYq7BY=/1960x1103/cloudfront-eu-central-1.images.arcpublishing.com/prisa/Q7SCZD53HZEF3ICW4HEPOAUNAM.jpg" alt="" class="carousel-image">
                        <div class="text-container">
                            <div class="text-3xl font-extrabold">FC BARCELONA</div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://www.estadiodeportivo.com/imagenes/448d9e08-5b70-478e-bfe5-1e45b3a217fc_1200x680.jpeg" alt="" class="carousel-image">
                        <div class="text-container">
                            <div class="text-3xl font-extrabold">REAL MADRID</div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://naciondeportes.com/wp-content/uploads/2023/08/portadas-nacion-2023-08-10t124936179.jpg" alt="" class="carousel-image">
                        <div class="text-container">
                            <div class="text-3xl font-extrabold">MANCHESTER CITY</div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://e00-expansion.uecdn.es/assets/multimedia/imagenes/2018/05/25/15272705459295.jpg" alt="" class="carousel-image">
                        <div class="text-container">
                            <div class="text-3xl font-extrabold">LIVERPOOL</div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://media.primicias.ec/2023/12/20125008/Jugadores-Manchester-United.jpg" alt="" class="carousel-image">
                        <div class="text-container">
                            <div class="text-3xl font-extrabold">MANCHESTER UNITED</div>
                        </div>
                    </div>
                </div>
            <div class="prev" onclick="changeSlide(-1)">❮</div>
            <div class="next" onclick="changeSlide(1)">❯</div>
        </div>
    </div>
        <br>

        <script>
            let currentIndex = 0;

            function changeSlide(n) {
                currentIndex += n;
                showSlide();
            }

            function showSlide() {
                const slides = document.querySelector('.carousel-inner');
                const totalSlides = document.querySelectorAll('.carousel-item').length;
                currentIndex = (currentIndex + totalSlides) % totalSlides; // Asegurar que currentIndex esté en el rango adecuado

                const translateValue = -currentIndex * 100 + '%';
                slides.style.transform = 'translateX(' + translateValue + ')';}
        </script>

        <!--TERCERA SECCIÓN-->
        <div class="flex px-3">
            <div class="w-full px-10 py-5 m-2 border border-black rounded-lg bg-cover bg-center border-2 border-white" style="background-image: url('https://i.pinimg.com/564x/fb/55/b9/fb55b97a08551278e3a9996dd89b9a13.jpg');">
                <h2 class="text-center text-2xl font-semibold text-white font-mono">Tabla de Posiciones</h2>
                <h2 class="text-center text-3xl font-semibold text-blue-500 border-b-4 border-black pb-2 font-mono">GRUPO A</h2>
                <table class="w-full mt-2 text-center ">
                    <thead class="font-serif">
                        <tr>
                            <th class="border-r-2 border-black px-4 py-2 text-white">Equipo</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">PJ</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">PG</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">PE</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">PP</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">GF</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">GC</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">DG</th>
                            <th class="border-l-2 border-black px-4 py-2 text-white">Pts</th>
                        </tr>
                    </thead>
                    <tbody class="font-serif">
                        <tr>
                            <th>Software</th>
                            <th>3</th>
                            <th>2</th>
                            <th>0</th>
                            <th>1</th>
                            <th>10</th>
                            <th>4</th>
                            <th>6</th>
                            <th>6</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="w-full px-10 py-5 m-2 border border-black rounded-lg bg-cover bg-center border-2 border-white" style="background-image: url('https://i.pinimg.com/564x/fb/55/b9/fb55b97a08551278e3a9996dd89b9a13.jpg');">
                <h2 class="text-center text-2xl font-semibold text-white font-mono">Tabla de Posiciones</h2>
                <h2 class="text-center text-3xl font-semibold text-blue-500 border-b-4 border-black pb-2 font-mono">GRUPO B</h2>
                <table class="w-full mt-2 text-center">
                    <thead class="font-serif">
                        <tr>
                            <th class="border-r-2 border-black px-4 py-2 text-white">Equipo</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">PJ</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">PG</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">PE</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">PP</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">GF</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">GC</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">DG</th>
                            <th class="border-l-2 border-black px-4 py-2 text-white">Pts</th>
                        </tr>
                    </thead>
                
                    <tbody class="font-serif">
                        <tr>
                            <th>Software</th>
                            <th>3</th>
                            <th>2</th>
                            <th>0</th>
                            <th>1</th>
                            <th>10</th>
                            <th>4</th>
                            <th>6</th>
                            <th>6</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--CUARTA SECCIÓN-->
        <div class="flex px-3">
        <div class="w-full px-10 py-5 m-2 border border-black rounded-lg bg-cover bg-center border-2 border-white" style="background-image: url('https://i.pinimg.com/564x/fb/55/b9/fb55b97a08551278e3a9996dd89b9a13.jpg');">
                <h2 class="text-center text-2xl font-semibold text-white border-b-4 border-black pb-2 font-mono">Goleadores</h2>
                <table class="w-full mt-2 text-center">
                    <thead class="font-serif">
                        <tr>
                            <th class="border-r-2 border-black px-4 py-2 text-white">Nombre</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">Numero</th>
                            <th class="border-l-2 border-black px-4 py-2 text-white">Goles</th>
                            <th class="border-l-2 border-black px-4 py-2 text-white">Equipo</th>
                        </tr>
                    </thead>
                    <tbody class="font-serif">
                    </tbody>
                </table>
            </div>

            <div class="w-full px-10 py-5 m-2 border border-black rounded-lg bg-cover bg-center border-2 border-white" style="background-image: url('https://i.pinimg.com/564x/fb/55/b9/fb55b97a08551278e3a9996dd89b9a13.jpg');">
                <h2 class="text-center text-2xl font-semibold text-white border-b-4 border-black pb-2 font-mono">Próximos Encuentros</h2>
                <table class="w-full mt-2 text-center">
                    <thead class="font-serif">
                        <tr>
                            <th class="border-r-2 border-black px-4 py-2 text-white">Equipo Local</th>
                            <th class="border-r-2 border-black px-4 py-2 text-white">Equipo Visitante</th>
                            <th class="border-l-2 border-black px-4 py-2 text-white">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="font-serif">
                        <tr>
                            <th>Equipo 1A</th>
                            <th>Equipo 2A</th>
                            <th>01/02/2024</th>
                        </tr>
                        <tr>
                            <th>Equipo 3A</th>
                            <th>Equipo 4A</th>
                            <th>02/02/2024</th>
                        </tr>
                        <tr>
                            <th>Equipo 1B</th>
                            <th>Equipo 2B</th>
                            <th>03/02/2024</th>
                        </tr>
                        <tr>
                            <th>Equipo 3B</th>
                            <th>Equipo 4B</th>
                            <th>04/02/2024</th>
                        </tr>
                        <tr>
                            <th>Equipo 5A</th>
                            <th>Equipo 6B</th>
                            <th>05/02/2024</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <!--QUINTA SECCIÓN-->
        <div class="footer bg-gray-900 p-5 text-center text-white">
            <p>Derechos reservados © 2024 - (G4) DESARROLLO WEB AVANZADO SW</p>
        </div>
    </body>
    </html>