<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partido;

class Partidos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $hora, $ubicacion, $golesEquipo1, $golesEquipo2, $tarjetaAmarilla, $tarjetaRoja, $equipo_uno, $equipo_dos;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.partidos.view', [
            'partidos' => Partido::latest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('hora', 'LIKE', $keyWord)
						->orWhere('ubicacion', 'LIKE', $keyWord)
						->orWhere('golesEquipo1', 'LIKE', $keyWord)
						->orWhere('golesEquipo2', 'LIKE', $keyWord)
						->orWhere('tarjetaAmarilla', 'LIKE', $keyWord)
						->orWhere('tarjetaRoja', 'LIKE', $keyWord)
						->orWhere('equipo_uno', 'LIKE', $keyWord)
						->orWhere('equipo_dos', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->fecha = null;
		$this->hora = null;
		$this->ubicacion = null;
		$this->golesEquipo1 = null;
		$this->golesEquipo2 = null;
		$this->tarjetaAmarilla = null;
		$this->tarjetaRoja = null;
		$this->equipo_uno = null;
		$this->equipo_dos = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'hora' => 'required',
		'ubicacion' => 'required',
		'golesEquipo1' => 'required',
		'golesEquipo2' => 'required',
		'tarjetaAmarilla' => 'required',
		'tarjetaRoja' => 'required',
		'equipo_uno' => 'required',
		'equipo_dos' => 'required',
        ]);

        Partido::create([ 
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'ubicacion' => $this-> ubicacion,
			'golesEquipo1' => $this-> golesEquipo1,
			'golesEquipo2' => $this-> golesEquipo2,
			'tarjetaAmarilla' => $this-> tarjetaAmarilla,
			'tarjetaRoja' => $this-> tarjetaRoja,
			'equipo_uno' => $this-> equipo_uno,
			'equipo_dos' => $this-> equipo_dos
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Partido Successfully created.');
    }

    public function edit($id)
    {
        $record = Partido::findOrFail($id);
        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->hora = $record-> hora;
		$this->ubicacion = $record-> ubicacion;
		$this->golesEquipo1 = $record-> golesEquipo1;
		$this->golesEquipo2 = $record-> golesEquipo2;
		$this->tarjetaAmarilla = $record-> tarjetaAmarilla;
		$this->tarjetaRoja = $record-> tarjetaRoja;
		$this->equipo_uno = $record-> equipo_uno;
		$this->equipo_dos = $record-> equipo_dos;
    }

    public function update()
    {
        $this->validate([
		'fecha' => 'required',
		'hora' => 'required',
		'ubicacion' => 'required',
		'golesEquipo1' => 'required',
		'golesEquipo2' => 'required',
		'tarjetaAmarilla' => 'required',
		'tarjetaRoja' => 'required',
		'equipo_uno' => 'required',
		'equipo_dos' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Partido::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'ubicacion' => $this-> ubicacion,
			'golesEquipo1' => $this-> golesEquipo1,
			'golesEquipo2' => $this-> golesEquipo2,
			'tarjetaAmarilla' => $this-> tarjetaAmarilla,
			'tarjetaRoja' => $this-> tarjetaRoja,
			'equipo_uno' => $this-> equipo_uno,
			'equipo_dos' => $this-> equipo_dos
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Partido Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Partido::where('id', $id)->delete();
        }
    }
}