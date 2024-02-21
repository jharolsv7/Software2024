<div class="overflow-x-auto">
    <table class="w-full border-collapse border mt-4 text-center rounded-lg overflow-hidden shadow-lg text-sm md:text-base">
        <!-- Encabezados de la tabla -->
        <thead class="bg-gradient-to-r from-blue-500 to-blue-800 text-white">
            <tr>
                <th class="border px-2 py-1 md:px-4 md:py-2">Equipo</th>
                <th class="border px-2 py-1 md:px-4 md:py-2">Goles a Favor</th>
                <th class="border px-2 py-1 md:px-4 md:py-2">Goles en Contra</th>
                <th class="border px-2 py-1 md:px-4 md:py-2">Puntos</th>
            </tr>
        </thead>

        <!-- Contenido de la tabla -->
        <tbody class="bg-gray-700">
            @forelse($equipos as $row)
                <tr class="hover:bg-gray-800">
                    <td class="border px-2 py-1 md:px-4 md:py-2 text-white bg-blue-600">
                        {{ $row->nombre }}
                    </td>
                    <td class="border px-2 py-1 md:px-4 md:py-2 bg-blue-200">{{ $row->goles_a_favor }}</td>
                    <td class="border px-2 py-1 md:px-4 md:py-2 bg-blue-300">{{ $row->goles_en_contra }}</td>
                    <td class="border px-2 py-1 md:px-4 md:py-2 bg-blue-400 text-white">{{ $row->puntos }}</td>
                </tr>
            @empty
            <tr class="hover:bg-gray-800 transition-bg duration-300">

                    <td colspan="4" class="border px-2 py-1 md:px-4 md:py-2 bg-gray-300 text-black">Proximamente</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
