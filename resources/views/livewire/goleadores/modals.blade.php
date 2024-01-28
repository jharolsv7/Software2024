<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Goleadore</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="partido_id">Elegir Partido:</label>
                        <select wire:model="partido_id" class="form-control">
                            <option value="">Seleccione el partido</option>
                            @foreach($partidos as $partido)
                                <option value="{{ $partido->id }}">
                                    {{ $partido->equipo->nombre }} vs {{ $partido->equipoDos->nombre }} / {{ $partido->fase->nombre_fase }} / {{ $partido->fecha }}
                                </option>
                            @endforeach
                        </select>
                        @error('partido_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jugador_id">Seleccionar Jugador:</label>
                        <select wire:model="jugador_id" class="form-control">
                            <option value="">Seleccione un jugador</option>
                            @foreach ($jugadores as $jugador)
                                <option value="{{ $jugador->id }}">{{ $jugador->nombre }}</option>
                            @endforeach
                        </select>
                        @error('jugador_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="goles">Goles del Jugador:</label>
                        <input wire:model="goles" type="number" class="form-control" id="goles" placeholder="Goles" min="0">
                        @error('goles') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Goleadore</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="partido_id">Elegir Partido:</label>
                        <select wire:model="partido_id" class="form-control">
                            <option value="">Seleccione el partido</option>
                            @foreach($partidos as $partido)
                                <option value="{{ $partido->id }}">
                                    {{ $partido->equipo->nombre }} vs {{ $partido->equipoDos->nombre }} / {{ $partido->fase->nombre_fase }} / {{ $partido->fecha }}
                                </option>
                            @endforeach
                        </select>
                        @error('partido_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jugador_id">Seleccionar Jugador:</label>
                        <select wire:model="jugador_id" class="form-control">
                            <option value="">Seleccione un jugador</option>
                            @foreach ($jugadores as $jugador)
                                <option value="{{ $jugador->id }}">{{ $jugador->nombre }}</option>
                            @endforeach
                        </select>
                        @error('jugador_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="goles">Goles del Jugador:</label>
                        <input wire:model="goles" type="number" class="form-control" id="goles" placeholder="Goles" min="0">
                        @error('goles') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
