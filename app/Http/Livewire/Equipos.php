<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;

class Equipos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $logo, $eslogan, $nombreMadrina, $inscripcionMonto, $puntos, $grupo, $goles_a_favor, $goles_en_contra;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.equipos.view', [
            'equipos' => Equipo::latest()
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
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
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

        Equipo::create([ 
			'nombre' => $this-> nombre,
			'logo' => $this-> logo,
			'eslogan' => $this-> eslogan,
			'nombreMadrina' => $this-> nombreMadrina,
			'inscripcionMonto' => $this-> inscripcionMonto,
			'puntos' => $this-> puntos,
			'grupo' => $this-> grupo,
			'goles_a_favor' => $this-> goles_a_favor,
			'goles_en_contra' => $this-> goles_en_contra
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Equipo Successfully created.');
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
		
        $this->updateMode = true;
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
			$record = Equipo::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'logo' => $this-> logo,
			'eslogan' => $this-> eslogan,
			'nombreMadrina' => $this-> nombreMadrina,
			'inscripcionMonto' => $this-> inscripcionMonto,
			'puntos' => $this-> puntos,
			'grupo' => $this-> grupo,
			'goles_a_favor' => $this-> goles_a_favor,
			'goles_en_contra' => $this-> goles_en_contra
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Equipo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Equipo::where('id', $id);
            $record->delete();
        }
    }
}
