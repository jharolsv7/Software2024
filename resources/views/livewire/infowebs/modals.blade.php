<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nueva Informacion del Sitio</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="fecha_campeonato"></label>
                        <input wire:model="fecha_campeonato" type="date" class="form-control" id="fecha_campeonato" placeholder="Fecha del Campeonato">@error('fecha_campeonato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                            <label for="foto_sitio">Foto del Sitio:</label>
                            <input wire:model="foto_sitio" type="file" class="form-control" id="foto_sitio" accept="image/*">@error('foto_sitio') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    <div class="form-group">
                        <label for="informacion"></label>
                        <input wire:model="informacion" type="text" class="form-control" id="informacion" placeholder="Informacion">@error('informacion') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Informacion del Sitio</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="fecha_campeonato"></label>
                        <input wire:model="fecha_campeonato" type="date" class="form-control" id="fecha_campeonato" placeholder="Fecha de Campeonato">@error('fecha_campeonato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_sitio">Foto del Sitio:</label>
                        <input wire:model="foto_sitio" type="file" class="form-control" id="foto_sitio" accept="image/*">@error('foto_sitio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="informacion"></label>
                        <input wire:model="informacion" type="text" class="form-control" id="informacion" placeholder="Informacion">@error('informacion') <span class="error text-danger">{{ $message }}</span> @enderror
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
