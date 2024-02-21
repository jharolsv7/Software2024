<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Equipo</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nombre"></label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre del Equipo">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo"></label>
                        <input  wire:model="logo" type="file" class="form-control" id="logo" placeholder="Logo del Equipo">@error('logo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="eslogan"></label>
                        <input wire:model="eslogan" type="text" class="form-control" id="eslogan" placeholder="Eslogan">@error('eslogan') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombreMadrina"></label>
                        <input wire:model="nombreMadrina" type="text" class="form-control" id="nombreMadrina" placeholder="Nombre de la Madrina">@error('nombreMadrina') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="inscripcionMonto"></label>
                        <input wire:model="inscripcionMonto" type="number" class="form-control" id="inscripcionMonto" placeholder="Monto de la Inscripción" min="0">@error('inscripcionMonto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="puntos"></label>
                        <input wire:model="puntos" type="number" class="form-control" id="puntos" placeholder="Puntos">@error('puntos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="grupo">Grupo</label>
                        <select wire:model="grupo" class="form-control" id="grupo">
                            <option value="">-- Seleccionar Grupo --</option>
                            <option value="A">Grupo A</option>
                            <option value="B">Grupo B</option>
                        </select>
                        @error('grupo') 
                            <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="goles_a_favor"></label>
                        <input wire:model="goles_a_favor" type="number" class="form-control" id="goles_a_favor" placeholder="Goles A Favor" min="0">@error('goles_a_favor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="goles_en_contra"></label>
                        <input wire:model="goles_en_contra" type="number" class="form-control" id="goles_en_contra" placeholder="Goles En Contra" min="0">@error('goles_en_contra') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Equipo</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nombre">Nombre-Equipo</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input  wire:model="logo" type="file" class="form-control" id="logo" placeholder="Logo del Equipo">@error('logo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="eslogan">Slogan</label>
                        <input wire:model="eslogan" type="text" class="form-control" id="eslogan" placeholder="Eslogan">@error('eslogan') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombreMadrina">Nombre de la Madrina</label>
                        <input wire:model="nombreMadrina" type="text" class="form-control" id="nombreMadrina" placeholder="Nombre de la Madrina">@error('nombreMadrina') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="inscripcionMonto">Monto de la Inscripción</label>
                        <input wire:model="inscripcionMonto" type="number" class="form-control" id="inscripcionMonto" placeholder="Monto de la Inscripción" min="0">@error('inscripcionMonto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="puntos">Puntos</label>
                        <input wire:model="puntos" type="number" class="form-control" id="puntos" placeholder="Puntos" min="0" step="1">@error('puntos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="grupo">Seleccione un grupo:</label>
                        <select wire:model="grupo" class="form-control" id="grupo">
                            <option value="">-- Seleccionar Grupo --</option>
                            <option value="A">Grupo A</option>
                            <option value="B">Grupo B</option>
                        </select>
                        @error('grupo') 
                            <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="goles_a_favor">Goles a Favor</label>
                        <input wire:model="goles_a_favor" type="number" class="form-control" id="goles_a_favor" placeholder="Goles A Favor" min="0" step="1">@error('goles_a_favor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="goles_en_contra">Goles en Contra</label>
                        <input wire:model="goles_en_contra" type="number" class="form-control" id="goles_en_contra" placeholder="Goles En Contra" min="0" step="1">@error('goles_en_contra') <span class="error text-danger">{{ $message }}</span> @enderror
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
<button wire:click.prevent="sortearEquipos" class="btn btn-success">Sortear Equipos</button>