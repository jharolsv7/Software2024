<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Goleadore;
use App\Models\Jugador;
use App\Models\Partido;

class Goleadores extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $partido_id, $jugador_id, $goles;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';

        // Obtén el partido seleccionado
        $partido = Partido::with(['equipo', 'equipoDos'])->find($this->partido_id);

        // Obtén los jugadores de los equipos del partido
        $jugadores = [];
        if ($partido) {
            $equiposPartido = [$partido->equipo->id, $partido->equipoDos->id];
            $jugadores = Jugador::whereIn('equipo_id', $equiposPartido)->get();
        }
        
        return view('livewire.goleadores.view', [
            'goleadores' => Goleadore::latest()
						->orWhere('partido_id', 'LIKE', $keyWord)
						->orWhere('jugador_id', 'LIKE', $keyWord)
						->orWhere('goles', 'LIKE', $keyWord)
						->paginate(10),
                        'jugadores' => $jugadores,
                        'partidos' => Partido::all(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->partido_id = null;
		$this->jugador_id = null;
		$this->goles = null;
    }

    public function store()
    {
        $this->validate([
		'partido_id' => 'required',
		'jugador_id' => 'required',
		'goles' => 'required',
        ]);

        Goleadore::create([ 
			'partido_id' => $this-> partido_id,
			'jugador_id' => $this-> jugador_id,
			'goles' => $this-> goles
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Goleador creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Goleadore::findOrFail($id);
        $this->selected_id = $id; 
		$this->partido_id = $record-> partido_id;
		$this->jugador_id = $record-> jugador_id;
		$this->goles = $record-> goles;
    }

    public function update()
    {
        $this->validate([
		'partido_id' => 'required',
		'jugador_id' => 'required',
		'goles' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Goleadore::find($this->selected_id);
            $record->update([ 
			'partido_id' => $this-> partido_id,
			'jugador_id' => $this-> jugador_id,
			'goles' => $this-> goles
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Goleador actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Goleadore::where('id', $id)->delete();
        }
    }
}