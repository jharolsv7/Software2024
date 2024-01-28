<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sancionjugador;
use App\Models\Jugador;

class Sancionjugadors extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $jugador_id, $detalles, $fecha, $monto, $estado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sancionjugadors.view', [
            'sancionjugadors' => Sancionjugador::latest()
						->orWhere('jugador_id', 'LIKE', $keyWord)
						->orWhere('detalles', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('monto', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->paginate(10),
                        'jugadores' => Jugador::all(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->jugador_id = null;
		$this->detalles = null;
		$this->fecha = null;
		$this->monto = null;
		$this->estado = null;
    }

    public function store()
    {
        $this->validate([
		'jugador_id' => 'required',
		'detalles' => 'required',
		'fecha' => 'required',
		'monto' => 'required',
		'estado' => 'required',
        ]);

        Sancionjugador::create([ 
			'jugador_id' => $this-> jugador_id,
			'detalles' => $this-> detalles,
			'fecha' => $this-> fecha,
			'monto' => $this-> monto,
			'estado' => $this-> estado
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Sancionjugador Successfully created.');
    }

    public function edit($id)
    {
        $record = Sancionjugador::findOrFail($id);
        $this->selected_id = $id; 
		$this->jugador_id = $record-> jugador_id;
		$this->detalles = $record-> detalles;
		$this->fecha = $record-> fecha;
		$this->monto = $record-> monto;
		$this->estado = $record-> estado;
    }

    public function update()
    {
        $this->validate([
		'jugador_id' => 'required',
		'detalles' => 'required',
		'fecha' => 'required',
		'monto' => 'required',
		'estado' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Sancionjugador::find($this->selected_id);
            $record->update([ 
			'jugador_id' => $this-> jugador_id,
			'detalles' => $this-> detalles,
			'fecha' => $this-> fecha,
			'monto' => $this-> monto,
			'estado' => $this-> estado
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Sancionjugador Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Sancionjugador::where('id', $id)->delete();
        }
    }
}