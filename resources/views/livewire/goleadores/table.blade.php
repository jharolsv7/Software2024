<div class="overflow-x-auto">
    <div class="table-responsive">
        <table class="w-full md:table-auto border-collapse border mt-2 text-center rounded-lg overflow-hidden shadow-lg">
            <!-- Encabezados de la tabla -->
            <thead class="bg-gradient-to-r from-blue-500 to-blue-800 text-white">
                <tr>
                    <th class="border px-2 py-1 md:px-6 md:py-3">Jugador</th>
                    <th class="border px-2 py-1 md:px-6 md:py-3 bg-blue-600 text-white">Equipo</th>
                    <th class="border px-2 py-1 md:px-6 md:py-3 bg-blue-600 text-white">Goles</th>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>

            <!-- Contenido de la tabla -->
            <tbody class="bg-blue-700 text-white">
                @forelse($goleadores as $goleador)
                    <tr>
                        <td class="border px-2 py-1 md:px-6 md:py-3">{{ optional($goleador->jugador)->nombre }}</td>
                        <td class="border px-2 py-1 md:px-6 md:py-3 bg-blue-200 text-black">{{ optional($goleador->jugador->equipo)->nombre }}</td>
                        <td class="border px-2 py-1 md:px-6 md:py-3 bg-blue-200 text-black">{{ $goleador->goles }}</td>
                        <!-- Agrega más columnas según tus necesidades -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border px-2 py-1 md:px-6 md:py-3 bg-gray-300 text-black">Sin goleadores encontrados</td>
                        <!-- Ajusta el colspan según la cantidad de columnas en la tabla -->
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
