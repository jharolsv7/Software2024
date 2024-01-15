<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jugadore;

class Jugadores extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $numero, $numeroGoles, $equipo_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.jugadores.view', [
            'jugadores' => Jugadore::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('numero', 'LIKE', $keyWord)
						->orWhere('numeroGoles', 'LIKE', $keyWord)
						->orWhere('equipo_id', 'LIKE', $keyWord)
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
		$this->numero = null;
		$this->numeroGoles = null;
		$this->equipo_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'numero' => 'required',
		'numeroGoles' => 'required',
		'equipo_id' => 'required',
        ]);

        Jugadore::create([ 
			'nombre' => $this-> nombre,
			'numero' => $this-> numero,
			'numeroGoles' => $this-> numeroGoles,
			'equipo_id' => $this-> equipo_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Jugadore Successfully created.');
    }

    public function edit($id)
    {
        $record = Jugadore::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->numero = $record-> numero;
		$this->numeroGoles = $record-> numeroGoles;
		$this->equipo_id = $record-> equipo_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'numero' => 'required',
		'numeroGoles' => 'required',
		'equipo_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Jugadore::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'numero' => $this-> numero,
			'numeroGoles' => $this-> numeroGoles,
			'equipo_id' => $this-> equipo_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Jugadore Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Jugadore::where('id', $id);
            $record->delete();
        }
    }
}
