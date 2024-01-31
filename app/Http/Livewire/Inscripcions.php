<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inscripcion;
use App\Models\Equipo;

class Inscripcions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion, $monto, $fecha, $estado, $equipo_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.inscripcions.view', [
            'inscripcions' => Inscripcion::latest()
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('monto', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->orWhere('equipo_id', 'LIKE', $keyWord)
						->paginate(10),
                        'equipos' => Equipo::all(),
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
		$this->descripcion = null;
		$this->monto = null;
		$this->fecha = null;
		$this->estado = null;
		$this->equipo_id = null;
    }

    public function store()
    {
        $this->validate([
		'descripcion' => 'required',
		'monto' => 'required',
		'fecha' => 'required',
		'estado' => 'required',
		'equipo_id' => 'required',
        ]);

         $equipo = Equipo::findOrFail($this->equipo_id);

    // Verificar si ya existe una inscripción para este equipo
    if ($equipo->inscripcion) {
        // Ya existe una inscripción, puedes mostrar un mensaje de error o manejarlo según tus necesidades.
        session()->flash('error', 'Ya existe una inscripción para este equipo.');
        return;
    }

    // Validar y establecer la fecha
    $fecha = $this->fecha ?: now(); // Si $this->fecha está vacío, establece la fecha actual

        Inscripcion::create([ 
			'descripcion' => $this-> descripcion,
			'monto' => $this-> monto,
			'fecha' => $this-> fecha,
			'estado' => $this-> estado,
			'equipo_id' => $this-> equipo_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Inscripcion creada exitosamente.');
        return redirect()->refresh();
    }

    public function edit($id)
    {
        $record = Inscripcion::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
		$this->monto = $record-> monto;
		$this->fecha = $record-> fecha;
		$this->estado = $record-> estado;
		$this->equipo_id = $record-> equipo_id;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
		'monto' => 'required',
		'fecha' => 'required',
		'estado' => 'required',
		'equipo_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Inscripcion::find($this->selected_id);
            $record->update([ 
			'descripcion' => $this-> descripcion,
			'monto' => $this-> monto,
			'fecha' => $this-> fecha,
			'estado' => $this-> estado,
			'equipo_id' => $this-> equipo_id
            ]);

           // Obtener el equipo asociado a la inscripción
            $equipo = Equipo::find($this->equipo_id);

            // Actualizar el monto en el modelo Equipo
            $equipo->update(['inscripcionMonto' => $this->monto]);

            // Emitir evento para actualizar el monto en Equipos
            $this->emit('montoActualizado', $this->monto);

            // Emitir evento para forzar una actualización en Livewire
            $this->emitSelf('refreshComponent');
            
            session()->flash('message', 'Inscripcion actualizada exitosamente.');
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Inscripcion::where('id', $id)->delete();
        }
    }
}