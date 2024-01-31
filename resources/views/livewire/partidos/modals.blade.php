<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear un Partido</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="fecha"></label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="hora"></label>
                        <input wire:model="hora" type="time" class="form-control" id="hora" placeholder="Hora">@error('hora') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fase_id">Fase del Encuentro:</label>
                        <select wire:model="fase_id" class="form-control">
                            <option value="">Seleccione la fase</option>
                            @foreach($fases as $fase)
                                <option value="{{ $fase->id }}">{{ $fase->nombre_fase }}</option>
                            @endforeach
                        </select>
                        @error('fase_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ubicacion"></label>
                        <input wire:model="ubicacion" type="text" class="form-control" id="ubicacion" placeholder="Ubicacion">@error('ubicacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="golesEquipo1"></label>
                        <input wire:model="golesEquipo1" type="number" class="form-control" id="golesEquipo1" placeholder="Goles del Primer Equipo">@error('golesEquipo1') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="golesEquipo2"></label>
                        <input wire:model="golesEquipo2" type="number" class="form-control" id="golesEquipo2" placeholder="Goles del Segundo Equipo">@error('golesEquipo2') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarjetaAmarilla"></label>
                        <input wire:model="tarjetaAmarilla" type="number" class="form-control" id="tarjetaAmarilla" placeholder="Tarjetas Amarillas">@error('tarjetaAmarilla') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarjetaRoja"></label>
                        <input wire:model="tarjetaRoja" type="number" class="form-control" id="tarjetaRoja" placeholder="Tarjetas Rojas">@error('tarjetaRoja') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipo_uno">Equipo 1:</label>
                        <select wire:model="equipo_uno" class="form-control">
                            <option value="">Seleccione un equipo</option>
                            @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('equipo_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipo_dos">Equipo 2:</label>
                        <select wire:model="equipo_dos" class="form-control">
                            <option value="">Seleccione un equipo</option>
                            @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('equipo_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ganador"></label>
                        <input wire:model="ganador" type="text" class="form-control" id="ganador" placeholder="Ganador">@error('ganador') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Partido</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="fecha">Fecha Partido</label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="hora">Hora Partido</label>
                        <input wire:model="hora" type="time" class="form-control" id="hora" placeholder="Hora">@error('hora') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fase_id">Fase del Encuentro:</label>
                        <select wire:model="fase_id" class="form-control">
                            <option value="">Seleccione la fase</option>
                            @foreach($fases as $fase)
                                <option value="{{ $fase->id }}">{{ $fase->nombre_fase }}</option>
                            @endforeach
                        </select>
                        @error('fase_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Ubicación</label>
                        <input wire:model="ubicacion" type="text" class="form-control" id="ubicacion" placeholder="Ubicacion">@error('ubicacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="golesEquipo1">Goles Equipo-1</label>
                        <input wire:model="golesEquipo1" type="number" class="form-control" id="golesEquipo1" placeholder="Goles del Primer Equipo">@error('golesEquipo1') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="golesEquipo2">Goles Equipo-2</label>
                        <input wire:model="golesEquipo2" type="number" class="form-control" id="golesEquipo2" placeholder="Goles del Segundo Equipo">@error('golesEquipo2') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarjetaAmarilla">Tarjetas Amarillas</label>
                        <input wire:model="tarjetaAmarilla" type="text" class="form-control" id="tarjetaAmarilla" placeholder="Tarjetas Amarillas">@error('tarjetaAmarilla') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarjetaRoja">Tarjetas Rojas</label>
                        <input wire:model="tarjetaRoja" type="text" class="form-control" id="tarjetaRoja" placeholder="Tarjetas Rojas">@error('tarjetaRoja') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipo_uno">Equipo 1:</label>
                        <select wire:model="equipo_uno" class="form-control">
                            <option value="">Seleccione un equipo</option>
                            @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('equipo_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipo_dos">Equipo 2:</label>
                        <select wire:model="equipo_dos" class="form-control">
                            <option value="">Seleccione un equipo</option>
                            @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('equipo_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ganador"></label>
                        <input wire:model="ganador" type="text" class="form-control" id="ganador" placeholder="Ganador">@error('ganador') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
       </div>
    </div>
</div>
