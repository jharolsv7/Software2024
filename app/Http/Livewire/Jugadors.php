<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jugador;
use App\Models\Equipo;

class Jugadors extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $numero, $numeroGoles, $equipo_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.jugadors.view', [
            'jugadors' => Jugador::oldest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('numero', 'LIKE', $keyWord)
						->orWhere('equipo_id', 'LIKE', $keyWord)
						->paginate(10),
                        'equipos' => Equipo::all(), // Agregamos la lista de equipos aquí
        ]);
    }

    public function getEquipos()
    {
        return Equipo::all();
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->numero = null;
		$this->equipo_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'numero' => 'required',
		'equipo_id' => 'required',
        ]);

        Jugador::create([ 
			'nombre' => $this-> nombre,
			'numero' => $this-> numero,
			'equipo_id' => $this-> equipo_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Jugador creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Jugador::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->numero = $record-> numero;
		$this->equipo_id = $record-> equipo_id;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'numero' => 'required',
		'equipo_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Jugador::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'numero' => $this-> numero,
			'equipo_id' => $this-> equipo_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Jugador actualizado existosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Jugador::where('id', $id)->delete();
        }
    }

    public function getJugadoresByEquipo($equipoId)
    {
        return Jugador::where('equipo_id', $equipoId)->get();
    }
}