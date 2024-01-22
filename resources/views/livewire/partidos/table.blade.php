<table class="w-full border-collapse border mt-2 text-center rounded-lg overflow-hidden shadow-lg">
    <!-- Encabezados de la tabla -->
    <thead class="bg-gray-700 text-white">
        <tr>
            <th class="border px-4 py-2">Equipo Local</th>
            <th class="border px-4 py-2">Equipo Visitante</th>
            <th class="border px-4 py-2">Ubicación</th>
            <th class="border px-4 py-2">Fecha</th>
            <th class="border px-4 py-2">Hora</th>
        </tr>
    </thead>

    <!-- Contenido de la tabla -->
    <tbody class="bg-gray-500">
        @forelse($partidos as $partido)
            <tr>
                <td>{{ optional($partido->equipo)->nombre }}</td>
                <td>{{ optional($partido->equipoDos)->nombre }}</td>
                <td>{{ $partido->ubicacion }}</td>
                <td>{{ $partido->fecha }}</td>
                <td>{{ $partido->hora }}</td>
                <!-- Otros campos según tus necesidades -->
            </tr>
        @empty
            <tr>
                <td colspan="100%">Sin partidos encontrados</td>
            </tr>
        @endforelse
    </tbody>
</table>