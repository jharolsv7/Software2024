<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear un Partido</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<form>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Columna izquierda -->
                            <div class="form-group">
                                <label for="fecha">Fecha del Partido:</label>
                                <input wire:model="fecha" type="date" class="form-control text-start" id="fecha" placeholder="Fecha">
                                @error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora del Encuentro:</label>
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
                                <label for="ubicacion">Ubicación:</label>
                                <input wire:model="ubicacion" type="text" class="form-control" id="ubicacion" placeholder="Ubicacion">@error('ubicacion') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="golesEquipo1">Goles del Equipo 1:</label>
                                <input wire:model="golesEquipo1" type="number" class="form-control" id="golesEquipo1" placeholder="Goles del Primer Equipo">@error('golesEquipo1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="golesEquipo2">Goles del Equipo 2:</label>
                                <input wire:model="golesEquipo2" type="number" class="form-control" id="golesEquipo2" placeholder="Goles del Segundo Equipo">@error('golesEquipo2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">        
                            <div class="form-group">
                                <label for="tarjetaAmarilla">Total tarjetas Amarillas:</label>
                                <input wire:model="tarjetaAmarilla" type="number" class="form-control" id="tarjetaAmarilla" placeholder="Tarjetas Amarillas">@error('tarjetaAmarilla') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="tarjetaRoja">Total tarjetas Rojas:</label>
                                <input wire:model="tarjetaRoja" type="number" class="form-control" id="tarjetaRoja" placeholder="Tarjetas Rojas">@error('tarjetaRoja') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="equipo_uno_grupo">Grupo del Equipo:</label>
                                <select wire:model="equipo_uno_grupo" wire:change="cargarEquiposGrupoUno" class="form-control">
                                    <option value="">Seleccione un grupo</option>
                                    @foreach($grupos as $grupo)
                                        <option value="{{ $grupo }}">{{ $grupo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="equipo_uno">Equipo 1:</label>
                                <select wire:model="equipo_uno" class="form-control">
                                    <option value="">Seleccione un equipo</option>
                                    @foreach($equiposGrupoUno as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('equipo_uno') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="equipo_dos">Equipo 2:</label>
                                <select wire:model="equipo_dos" class="form-control">
                                    <option value="">Seleccione un equipo</option>
                                    @foreach($equiposGrupoUno as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('equipo_dos') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="ganador">Ganador del Partido:</label>
                                <input wire:model="ganador" type="text" class="form-control" id="ganador" placeholder="Ganador">@error('ganador') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
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
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Partido</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Columna izquierda -->
                            <div class="form-group">
                                <label for="fecha">Fecha del Partido:</label>
                                <input wire:model="fecha" type="date" class="form-control text-start" id="fecha" placeholder="Fecha">
                                @error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora del Encuentro:</label>
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
                                <label for="ubicacion">Ubicación:</label>
                                <input wire:model="ubicacion" type="text" class="form-control" id="ubicacion" placeholder="Ubicacion">@error('ubicacion') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="golesEquipo1">Goles del Equipo 1:</label>
                                <input wire:model="golesEquipo1" type="number" class="form-control" id="golesEquipo1" placeholder="Goles del Primer Equipo">@error('golesEquipo1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="golesEquipo2">Goles del Equipo 2:</label>
                                <input wire:model="golesEquipo2" type="number" class="form-control" id="golesEquipo2" placeholder="Goles del Segundo Equipo">@error('golesEquipo2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">        
                            <div class="form-group">
                                <label for="tarjetaAmarilla">Total tarjetas Amarillas:</label>
                                <input wire:model="tarjetaAmarilla" type="number" class="form-control" id="tarjetaAmarilla" placeholder="Tarjetas Amarillas">@error('tarjetaAmarilla') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="tarjetaRoja">Total tarjetas Rojas:</label>
                                <input wire:model="tarjetaRoja" type="number" class="form-control" id="tarjetaRoja" placeholder="Tarjetas Rojas">@error('tarjetaRoja') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="equipo_uno_grupo">Grupo del Equipo:</label>
                                <select wire:model="equipo_uno_grupo" wire:change="cargarEquiposGrupoUno" class="form-control">
                                    <option value="">Seleccione un grupo</option>
                                    @foreach($grupos as $grupo)
                                        <option value="{{ $grupo }}">{{ $grupo }}</option>
                                    @endforeach
                                </select>
                            </div>

                        @if($modoEdicion)
                            <!-- Sección para editar equipos -->
                            <div class="form-group">
                                <label for="equipo_uno">Equipo 1:</label>
                                <select wire:model="equipo_uno" class="form-control">
                                    <option value="">Seleccione un equipo</option>
                                    @foreach($equiposGrupoUno as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('equipo_uno') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="equipo_dos">Equipo 2:</label>
                                <select wire:model="equipo_dos" class="form-control">
                                    <option value="">Seleccione un equipo</option>
                                    @foreach($equiposGrupoUno as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('equipo_dos') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        @endif

                            <div class="form-group">
                                <label for="ganador">Ganador del Partido:</label>
                                <input wire:model="ganador" type="text" class="form-control" id="ganador" placeholder="Ganador">@error('ganador') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Asignar Goles</button> -->
            </div>
       </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar Goles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-auto">
                <div class="form-group mb-4 text-center">
                    <label class="mb-2">{{ $this->getEquipoNombre($equipo_uno) }}</label>
                    <p class="mb-0">Goles: {{ $golesEquipo1 }}</p>
                </div>
                <div class="form-group mb-4 text-center">
                    <label class="mb-2">{{ $this->getEquipoNombre($equipo_dos) }}</label>
                    <p class="mb-0">Goles: {{ $golesEquipo2 }}</p>
                </div>
                <div class="form-group">
                    <label for="equipoSeleccionado">Selecciona un equipo:</label>
                    <select wire:model="equipoSeleccionado" wire:change="cargarJugadores" class="form-control">
                        @foreach ($equipos as $equipo)
                            @if ($equipo->id == $equipo_uno || $equipo->id == $equipo_dos)
                                <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jugadorSeleccionado">Selecciona un jugador:</label>
                    <select wire:model="jugadorSeleccionado" class="form-control">
                        @foreach ($jugadoresEquipoSeleccionado as $jugador)
                            <option value="{{ $jugador->id }}">{{ $jugador->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="goles">Goles</label>
                    <input wire:model="goles" type="number" class="form-control" id="goles" placeholder="Goles del Segundo Equipo">@error('goles') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
