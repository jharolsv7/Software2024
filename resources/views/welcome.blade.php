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
    </head>
    
    <body class="antialiased bg-no-repeat bg-cover bg-center bg-fixed" style="background-image: url('/img/login.jpg');">
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
 
        <!-- TERCERA SECCIÓN -->
        <div class="bg-purple-800 bg-opacity-50 p-5">
            <div class="table-responsive flex justify-center">
                <!-- Tabla Grupo A -->
                <div class="mr-4" style="width: 48%;">
                    <h2 class="text-2xl font-bold mb-4 text-white text-center">Tabla de Posiciones Grupo A</h2>
                    @livewire('equipos-table', ['grupo' => 'A'])
                </div>
                <!-- Tabla Grupo B -->
                <div class="ml-4" style="width: 47%;">
                    <h2 class="text-2xl font-bold mb-4 text-white text-center">Tabla de Posiciones Grupo B</h2>
                    @livewire('equipos-table', ['grupo' => 'B'])
                </div>
            </div>

            <!-- CUARTA SECCIÓN -->
            <div class="flex justify-center p-5">
                <div class="mr-4" style="width: 50%;">
                    <h2 class="text-2xl font-bold mb-4 text-white text-center">Tabla de Goleadores</h2>
                    @livewire('jugadors-table')
                </div>
                <div class="ml-4" style="width: 50%;">
                    <h2 class="text-2xl font-bold mb-4 text-white text-center">Próximos Encuentros</h2>
                    @livewire('partidos-table')
                </div>
            </div>
        </div>

        <br>
        <!--QUINTA SECCIÓN-->
        <div class="footer bg-gray-900 p-5 text-center text-white">
            <br>
            <p>Derechos reservados © 2024 - (G4) DESARROLLO WEB AVANZADO SW</p>
            <br>
            <div class="mt-4 flex justify-center items-center mt-4">
                <a href="https://www.facebook.com/tu_usuario" target="_blank" class="text-white mx-2" title="Facebook">
                    <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABdUlEQVR4nO2Wu0oDQRhG06hgZ6PivY6FhdjpA1h4Q6zVIpUm+jpG1F6081ZaWGofA75AvIBZ0RATjwyMMFl2//x7EVLkg2mWOXN27pPJdNNpASaAPHADlIAPW0r22y4wnqZwFDgAGrRPEzgFppJKVwGP6KkCy3Gle7YHcWPYQpyeNiNI3oGvELmu58CYcngrwDYw4LB9wF3AsI9oxEcK6ScwHcLfBtQ/1GwZzeot+rgeYAaYBR4C6jfMSEpis0812XCYfqCsYHYk8bVSPO8wi0rmUhI/KhuZc5hNJVOSxF4M8ZaS8SSxOXvDshAKtrYRNt9VCXpKIgZ6ge8QviyBVwnFWYG/kMB9ATTX370tWYdZcr5LizMviSeBOukvrnrbuxo4+Qdxsd00/R2bbymKX8Xj0idfB35SEJs2VlRSp8GccCdrxIbNRZL6ev4SQ/wMrGWSBBgGjoGaQlyz9/lQImnADxSAc/cRYJ9JZ/aNNtgCddMJ+QUhA1R3vgYpAAAAAABJRU5ErkJggg=="></i>
                </a>
                <a href="https://www.instagram.com/tu_usuario" target="_blank" class="text-white mx-2" title="Instagram">
                    <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABW0lEQVR4nO2WzU7CUBBGuxd34ErXLEUXIkbfQYkPJPoE+PMQEBOfRPQhdOcPRRew0GMm+Uyaxk4LvcUNJ7kJ6cztSafTy0TRiv8G2AAugAfgk+J8ACPgHGjMKz0FJpQnBrrzSL8Jx1euXOUN8aRpxm7Z9U5DcAAcpq71PPFjILFJj1LXRp44r8xToA+0gTUt+30FzHL2TjyxxxOw7extKSeTaAHx9FcKbAG3qo6tO6Cp2I735NEC4n5C+vpH/M1iyrkOKd5T3J40i6Fy9kOKawWaL1bO+rLF4yrEbcWtkbIYKKcTUnypeFONlOYF2FTOTejPqZXo7KH+eWwNEtLd0J8TOhxazl6TPuMQlTgyZzoe7T3WtDoqb96RGXtimzaq4t4T27hSFWeeuKGGCc07UM8US97VuBIKu9exK03JbVwpi93jpJA0Ia/buGJNoZG1KBPt6eWWd0W0BH4A+ArvkemlaOQAAAAASUVORK5CYII="></i>
                </a>
                <a href="mailto:tu@email.com" class="text-white mx-2" title="Correo Electrónico">
                    <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACTklEQVR4nO2VXWiPYRjGX6bRxJiFyIkoitKyjANLTiTykR3KESlywMHObEtpbWlOpeSrHKx8ZuSAmBSlLVuTj1ghDow08jk/3Xn+ubp7/493f39ysKveg/e67+u+3ud57+d+kmQE/xuA+cBuoAO4D7wGvgIvgR7gGLAFqCiW4ZJglhWDQBtQWajhaKAJ+O4K20ovAIeBA2GlncAXl/ccWF6IabsrdA1YAZTk0UwAdgEvRPPZNMMxbnHircPQTgGuiP4tMDuLsFZEts3rM3/xrxrjgNtSpz2L6KYIml1sKXAcuANcBXba1gOrgPrw1IXcuaHrcwtYGDOtFtM3QLnEtgNDKV1sH3JI3i+K5qTwe2PGjZJ4UPgFKV2rGMhjXCd8Z8z4hiSuFl5XlOvwGmAN8MzF1HiW8P0x4yeSOEP4R8LbymdKbEPEeKzMgY8x4/chyZJLhf8khR86zeSIcYn0xbuY8YeQNKSDIpzlHHqcpixiPE34BzHjp5I4Vfh+4W1XxkvM/rWiQ2JrhT+V9QzXCn/CFW8L21gOXHex3qAZBVwSfmPMeJ8k7hd+WcplMSgDQn+F4awz7QbGxIxtMuVgw75MYq2kwwbNIukPD7uv5+U1le3RGdvgYtuAxxK/CyyWj74lXTwQzv/0qKkYrJTCVmRdSs5EbTAXK7UrMpOZh41LNzD22IqTvw1+duwZ96/uAZuBSf/CvCnlRrL3LuA8cAQ4Grq4r5C7+3dX5bmU45SGTUmxAcwBdgCnbUgAr4BvNoPDZLsMVBXdeATJH+IHmPllH+If2mEAAAAASUVORK5CYII="></i>
                </a>
            </div>
            <br>
        </div>
    </body>
    
    </html>






    