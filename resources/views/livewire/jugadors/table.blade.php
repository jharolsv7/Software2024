<table class="w-full border-collapse border mt-2 text-center rounded-lg overflow-hidden shadow-lg">
    <!-- Encabezados de la tabla -->
    <thead class="bg-gray-700 text-white">
        <tr>
            <th class="border px-4 py-2">Jugador</th>
            <th class="border px-4 py-2">Equipo</th>
            <!-- Agrega más columnas según tus necesidades -->
        </tr>
    </thead>

    <!-- Contenido de la tabla -->
    <tbody class="bg-gray-500">
        @forelse($jugadores as $jugador)
            <tr>
                <td>{{ $jugador->nombre }}</td>
                <td>{{ optional($jugador->equipo)->nombre }}</td>
                <!-- Agrega más columnas según tus necesidades -->
            </tr>
        @empty
            <tr>
                <td colspan="100%">Sin jugadores encontrados</td>
            </tr>
        @endforelse
    </tbody>
</table>