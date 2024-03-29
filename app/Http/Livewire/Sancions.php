<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sancion;
use App\Models\Jugador;

class Sancions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $monto, $fecha, $jugador_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sancions.view', [
            'sancions' => Sancion::oldest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->orWhere('monto', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('jugador_id', 'LIKE', $keyWord)
						->paginate(10),
                        'jugadors' => $this->getJugadors(),
        ]);
    }

    public function getJugadors()
    {
        return Jugador::all();
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->tipo = null;
		$this->monto = null;
		$this->fecha = null;
		$this->jugador_id = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'monto' => 'required',
		'fecha' => 'required',
		'jugador_id' => 'required',
        ]);

        Sancion::create([ 
			'tipo' => $this-> tipo,
			'monto' => $this-> monto,
			'fecha' => $this-> fecha,
			'jugador_id' => $this-> jugador_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Sancion creada exitosamente.');
    }

    public function edit($id)
    {
        $record = Sancion::findOrFail($id);
        $this->selected_id = $id; 
		$this->tipo = $record-> tipo;
		$this->monto = $record-> monto;
		$this->fecha = $record-> fecha;
		$this->jugador_id = $record-> jugador_id;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'monto' => 'required',
		'fecha' => 'required',
		'jugador_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Sancion::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo,
			'monto' => $this-> monto,
			'fecha' => $this-> fecha,
			'jugador_id' => $this-> jugador_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Sancion actualizada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Sancion::where('id', $id)->delete();
        }
    }
}