<div class="overflow-x-auto">
    <div class="table-responsive">
        <table class="w-full md:table-auto border-collapse border mt-2 text-center rounded-lg overflow-hidden shadow-lg">
            <!-- Encabezados de la tabla -->
            <thead class="bg-gradient-to-r from-blue-500 to-blue-800 text-white">
                <tr>
                    <th class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3">Equipo Local</th>
                    <th class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3">Equipo Visitante</th>
                    <th class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3">Ubicación</th>
                    <th class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3">Fecha</th>
                    <th class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3">Hora</th>
                </tr>
            </thead>

            <!-- Contenido de la tabla -->
            <tbody class="bg-gray-700">
                @forelse($partidos as $partido)
                    <tr class="hover:bg-gray-800">
                        <td class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3 text-white bg-blue-600 text-xs md:text-sm lg:text-base">
                            {{ optional($partido->equipo)->nombre }}
                        </td>
                        <td class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3 bg-blue-200 text-xs md:text-sm lg:text-base">
                            {{ optional($partido->equipoDos)->nombre }}
                        </td>
                        <td class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3 bg-blue-300 text-xs md:text-sm lg:text-base">{{ $partido->ubicacion }}</td>
                        <td class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3 bg-blue-400 text-xs md:text-sm lg:text-base">{{ $partido->fecha }}</td>
                        <td class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3 bg-blue-500 text-xs md:text-sm lg:text-base">{{ $partido->hora }}</td>
                        <!-- Otros campos según tus necesidades -->
                    </tr>
                @empty
                    <tr class="hover:bg-gray-800">
                        <td colspan="5" class="border px-2 py-1 md:px-4 md:py-2 lg:px-6 lg:py-3 bg-gray-300 text-black text-xs md:text-sm lg:text-base">Sin partidos encontrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
