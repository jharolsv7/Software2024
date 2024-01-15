<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="nombre"></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="logo"></label>
                <input wire:model="logo" type="text" class="form-control" id="logo" placeholder="Logo">@error('logo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="eslogan"></label>
                <input wire:model="eslogan" type="text" class="form-control" id="eslogan" placeholder="Eslogan">@error('eslogan') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nombreMadrina"></label>
                <input wire:model="nombreMadrina" type="text" class="form-control" id="nombreMadrina" placeholder="Nombremadrina">@error('nombreMadrina') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="inscripcionMonto"></label>
                <input wire:model="inscripcionMonto" type="text" class="form-control" id="inscripcionMonto" placeholder="Inscripcionmonto">@error('inscripcionMonto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="puntos"></label>
                <input wire:model="puntos" type="text" class="form-control" id="puntos" placeholder="Puntos">@error('puntos') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="grupo"></label>
                <input wire:model="grupo" type="text" class="form-control" id="grupo" placeholder="Grupo">@error('grupo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="goles_a_favor"></label>
                <input wire:model="goles_a_favor" type="text" class="form-control" id="goles_a_favor" placeholder="Goles A Favor">@error('goles_a_favor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="goles_en_contra"></label>
                <input wire:model="goles_en_contra" type="text" class="form-control" id="goles_en_contra" placeholder="Goles En Contra">@error('goles_en_contra') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
