<table class="w-full border-collapse border mt-2 text-center rounded-lg overflow-hidden shadow-lg">
<!-- Encabezados de la tabla -->
    <thead class="bg-gray-700 text-white">
        <tr>
            <th class="border px-4 py-2">Equipo</th>
            <th class="border px-4 py-2">Goles a Favor</th>
            <th class="border px-4 py-2">Goles en Contra</th>
            <th class="border px-4 py-2">Puntos</th>
        </tr>
    </thead>

    <!-- Contenido de la tabla -->
    <tbody class="bg-gray-500">
        @forelse($equipos as $row)
            <tr>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->goles_a_favor }}</td>
                <td>{{ $row->goles_en_contra }}</td>
                <td>{{ $row->puntos }}</td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="100%">Sin Datos</td>
            </tr>
        @endforelse
    </tbody>
</table>