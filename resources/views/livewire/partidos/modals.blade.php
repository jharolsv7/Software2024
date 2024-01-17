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
                        <input wire:model="tarjetaAmarilla" type="text" class="form-control" id="tarjetaAmarilla" placeholder="Tarjetas Amarillas">@error('tarjetaAmarilla') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarjetaRoja"></label>
                        <input wire:model="tarjetaRoja" type="text" class="form-control" id="tarjetaRoja" placeholder="Tarjetas Rojas">@error('tarjetaRoja') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipo_uno"></label>
                        <input wire:model="equipo_uno" type="text" class="form-control" id="equipo_uno" placeholder="Equipo Uno">@error('equipo_uno') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipo_dos"></label>
                        <input wire:model="equipo_dos" type="text" class="form-control" id="equipo_dos" placeholder="Equipo Dos">@error('equipo_dos') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar un Partido</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="fecha"></label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="hora"></label>
                        <input wire:model="hora" type="time" class="form-control" id="hora" placeholder="Hora">@error('hora') <span class="error text-danger">{{ $message }}</span> @enderror
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
                        <input wire:model="tarjetaAmarilla" type="text" class="form-control" id="tarjetaAmarilla" placeholder="Tarjetas Amarillas">@error('tarjetaAmarilla') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarjetaRoja"></label>
                        <input wire:model="tarjetaRoja" type="text" class="form-control" id="tarjetaRoja" placeholder="Tarjetas Rojas">@error('tarjetaRoja') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipo_uno"></label>
                        <input wire:model="equipo_uno" type="text" class="form-control" id="equipo_uno" placeholder="Equipo Uno">@error('equipo_uno') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipo_dos"></label>
                        <input wire:model="equipo_dos" type="text" class="form-control" id="equipo_dos" placeholder="Equipo Dos">@error('equipo_dos') <span class="error text-danger">{{ $message }}</span> @enderror
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
