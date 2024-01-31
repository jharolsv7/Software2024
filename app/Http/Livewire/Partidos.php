<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Fase;

class Partidos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $hora, $fase_id, $ubicacion, $golesEquipo1, $golesEquipo2, $tarjetaAmarilla, $tarjetaRoja, $equipo_uno, $equipo_dos, $ganador;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.partidos.view', [
            'partidos' => Partido::with(['equipo', 'equipoDos', 'fase'])
						->oldest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('hora', 'LIKE', $keyWord)
						->orWhere('fase_id', 'LIKE', $keyWord)
						->orWhere('ubicacion', 'LIKE', $keyWord)
						->orWhere('golesEquipo1', 'LIKE', $keyWord)
						->orWhere('golesEquipo2', 'LIKE', $keyWord)
						->orWhere('tarjetaAmarilla', 'LIKE', $keyWord)
						->orWhere('tarjetaRoja', 'LIKE', $keyWord)
						->orWhere('equipo_uno', 'LIKE', $keyWord)
						->orWhere('equipo_dos', 'LIKE', $keyWord)
						->orWhere('ganador', 'LIKE', $keyWord)
						->paginate(10),
                        'equipos' => Equipo::all(),
						'fases' => Fase::all(),
        ]);
    }
	
	public function getEquipos()
    {
        return Equipo::all();
    }

	public function getFases()
    {
        return Fase::all();
    }

    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->fecha = null;
		$this->hora = null;
		$this->fase_id = null;
		$this->ubicacion = null;
		$this->golesEquipo1 = null;
		$this->golesEquipo2 = null;
		$this->tarjetaAmarilla = null;
		$this->tarjetaRoja = null;
		$this->equipo_uno = null;
		$this->equipo_dos = null;
		$this->ganador = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'hora' => 'required',
		'fase_id' => 'required',
		'ubicacion' => 'required',
		'golesEquipo1' => 'required',
		'golesEquipo2' => 'required',
		'tarjetaAmarilla' => 'required',
		'tarjetaRoja' => 'required',
		'equipo_uno' => 'required',
		'equipo_dos' => 'required',
		'ganador' => 'required',
        ]);

        Partido::create([ 
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'fase_id' => $this-> fase_id,
			'ubicacion' => $this-> ubicacion,
			'golesEquipo1' => $this-> golesEquipo1,
			'golesEquipo2' => $this-> golesEquipo2,
			'tarjetaAmarilla' => $this-> tarjetaAmarilla,
			'tarjetaRoja' => $this-> tarjetaRoja,
			'equipo_uno' => $this-> equipo_uno,
			'equipo_dos' => $this-> equipo_dos,
			'ganador' => $this-> ganador
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Partido creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Partido::findOrFail($id);
        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->hora = $record-> hora;
		$this->fase_id = $record-> fase_id;
		$this->ubicacion = $record-> ubicacion;
		$this->golesEquipo1 = $record-> golesEquipo1;
		$this->golesEquipo2 = $record-> golesEquipo2;
		$this->tarjetaAmarilla = $record-> tarjetaAmarilla;
		$this->tarjetaRoja = $record-> tarjetaRoja;
		$this->equipo_uno = $record-> equipo_uno;
		$this->equipo_dos = $record-> equipo_dos;
		$this->ganador = $record-> ganador;
    }

    public function update()
    {
        $this->validate([
		'fecha' => 'required',
		'hora' => 'required',
		'fase_id' => 'required',
		'ubicacion' => 'required',
		'golesEquipo1' => 'required',
		'golesEquipo2' => 'required',
		'tarjetaAmarilla' => 'required',
		'tarjetaRoja' => 'required',
		'equipo_uno' => 'required',
		'equipo_dos' => 'required',
		'ganador' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Partido::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'fase_id' => $this-> fase_id,
			'ubicacion' => $this-> ubicacion,
			'golesEquipo1' => $this-> golesEquipo1,
			'golesEquipo2' => $this-> golesEquipo2,
			'tarjetaAmarilla' => $this-> tarjetaAmarilla,
			'tarjetaRoja' => $this-> tarjetaRoja,
			'equipo_uno' => $this-> equipo_uno,
			'equipo_dos' => $this-> equipo_dos,
			'ganador' => $this-> ganador
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Partido actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Partido::where('id', $id)->delete();
        }
    }
}