<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sancionequipo;
use App\Models\Equipo;

class Sancionequipos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $equipo_id, $detalles, $fecha, $monto, $estado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sancionequipos.view', [
            'sancionequipos' => Sancionequipo::oldest()
						->orWhere('equipo_id', 'LIKE', $keyWord)
						->orWhere('detalles', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('monto', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
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
		$this->equipo_id = null;
		$this->detalles = null;
		$this->fecha = null;
		$this->monto = null;
		$this->estado = null;
    }

    public function store()
    {
        $this->validate([
		'equipo_id' => 'required',
		'detalles' => 'required',
		'fecha' => 'required',
		'monto' => 'required',
		'estado' => 'required',
        ]);

        Sancionequipo::create([ 
			'equipo_id' => $this-> equipo_id,
			'detalles' => $this-> detalles,
			'fecha' => $this-> fecha,
			'monto' => $this-> monto,
			'estado' => $this-> estado
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Sancion Equipo creada exitosamente.');
    }

    public function edit($id)
    {
        $record = Sancionequipo::findOrFail($id);
        $this->selected_id = $id; 
		$this->equipo_id = $record-> equipo_id;
		$this->detalles = $record-> detalles;
		$this->fecha = $record-> fecha;
		$this->monto = $record-> monto;
		$this->estado = $record-> estado;
    }

    public function update()
    {
        $this->validate([
		'equipo_id' => 'required',
		'detalles' => 'required',
		'fecha' => 'required',
		'monto' => 'required',
		'estado' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Sancionequipo::find($this->selected_id);
            $record->update([ 
			'equipo_id' => $this-> equipo_id,
			'detalles' => $this-> detalles,
			'fecha' => $this-> fecha,
			'monto' => $this-> monto,
			'estado' => $this-> estado
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Sancion Equipo actualizada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Sancionequipo::where('id', $id)->delete();
        }
    }
}