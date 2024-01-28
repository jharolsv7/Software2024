<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads; // Agrega esta línea
use App\Models\Equipo;

class Equipos extends Component
{
    use WithPagination;
	use WithFileUploads; // Agrega esta línea

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $logo, $eslogan, $nombreMadrina, $inscripcionMonto, $puntos, $grupo, $goles_a_favor, $goles_en_contra;
	protected $listeners = ['montoActualizado'];
	public $fecha;
    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.equipos.view', [
            'equipos' => Equipo::oldest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('logo', 'LIKE', $keyWord)
						->orWhere('eslogan', 'LIKE', $keyWord)
						->orWhere('nombreMadrina', 'LIKE', $keyWord)
						->orWhere('inscripcionMonto', 'LIKE', $keyWord)
						->orWhere('puntos', 'LIKE', $keyWord)
						->orWhere('grupo', 'LIKE', $keyWord)
						->orWhere('goles_a_favor', 'LIKE', $keyWord)
						->orWhere('goles_en_contra', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
	public function montoActualizado($monto)
    {
        $this->InscripcionMonto = $monto;
        
        // Actualizar monto en el modelo Equipo
        $equipo = Equipo::find($this->selected_id);
        $equipo->update(['inscripcionMonto' => $monto]);

		// Emitir evento para forzar una actualización en Livewire
        $this->emitSelf('refreshComponent');
    }

    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->logo = null;
		$this->eslogan = null;
		$this->nombreMadrina = null;
		$this->inscripcionMonto = null;
		$this->puntos = null;
		$this->grupo = null;
		$this->goles_a_favor = null;
		$this->goles_en_contra = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'eslogan' => 'required',
		'nombreMadrina' => 'required',
		'inscripcionMonto' => 'required',
		'puntos' => 'required',
		'goles_a_favor' => 'required',
		'goles_en_contra' => 'required',
        ]);

        $equipo = Equipo::create([
			'nombre' => $this->nombre,
			'logo' => $this->logo,
			'eslogan' => $this->eslogan,
			'nombreMadrina' => $this->nombreMadrina,
			'inscripcionMonto' => $this->inscripcionMonto,
			'puntos' => $this->puntos,
			'grupo' => $this->grupo,
			'goles_a_favor' => $this->goles_a_favor,
			'goles_en_contra' => $this->goles_en_contra,
		]);

		// Crear la relación solo si no existe
		if (!$equipo->inscripcion) {
			// Validar y establecer la fecha
			$fecha = $this->fecha ?: now();

			$equipo->inscripcion()->create([
				'monto' => 0,
				'fecha' => $fecha,
				'descripcion' => "Generado Automaticamente",
				'estado' => 0,
				// Otros campos de la inscripción...
			]);
		}
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Equipo creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Equipo::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->logo = $record-> logo;
		$this->eslogan = $record-> eslogan;
		$this->nombreMadrina = $record-> nombreMadrina;
		$this->inscripcionMonto = $record-> inscripcionMonto;
		$this->puntos = $record-> puntos;
		$this->grupo = $record-> grupo;
		$this->goles_a_favor = $record-> goles_a_favor;
		$this->goles_en_contra = $record-> goles_en_contra;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'eslogan' => 'required',
		'nombreMadrina' => 'required',
		'inscripcionMonto' => 'required',
		'puntos' => 'required',
		'goles_a_favor' => 'required',
		'goles_en_contra' => 'required',
        ]);

		if ($this->selected_id) {
			$equipo = Equipo::find($this->selected_id);
			$equipo->update([
				'nombre' => $this->nombre,
				'logo' => $this->logo,
				'eslogan' => $this->eslogan,
				'nombreMadrina' => $this->nombreMadrina,
				'inscripcionMonto' => $this->inscripcionMonto,
				'puntos' => $this->puntos,
				'grupo' => $this->grupo,
				'goles_a_favor' => $this->goles_a_favor,
				'goles_en_contra' => $this->goles_en_contra,
			]);

			// Actualizar la relación solo si existe
			if ($equipo->inscripcion) {
				$equipo->inscripcion->update([
					'monto' => $this->inscripcionMonto
				]);
			}
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Equipo actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Equipo::where('id', $id)->delete();
        }
    }
}