<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Sancion Jugador</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
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
                        <label for="detalles"></label>
                        <input wire:model="detalles" type="text" class="form-control" id="detalles" placeholder="Detalles">@error('detalles') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha"></label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="monto"></label>
                        <input wire:model="monto" type="number" class="form-control" id="monto" placeholder="Monto">@error('monto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado"></label>
                        <div class="custom-control custom-switch">
                            <input wire:model="estado" type="checkbox" class="custom-control-input" id="customSwitch">
                            <label class="custom-control-label" for="customSwitch">{{ $estado ? 'Sanción Activa' : 'Sanción Inactiva' }}</label>
                        </div>
                        @error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Sancion Jugador</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
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
                        <label for="detalles">Detalle:</label>
                        <input wire:model="detalles" type="text" class="form-control" id="detalles" placeholder="Detalles">@error('detalles') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto:</label>
                        <input wire:model="monto" type="number" class="form-control" id="monto" placeholder="Monto">@error('monto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado"></label>
                        <div class="custom-control custom-switch">
                            <input wire:model="estado" type="checkbox" class="custom-control-input" id="customSwitch">
                            <label class="custom-control-label" for="customSwitch">{{ $estado ? 'Sanción Activa' : 'Sanción Inactiva' }}</label>
                        </div>
                        @error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
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