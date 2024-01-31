<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Fase;

class Fases extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_fase, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.fases.view', [
            'fases' => Fase::oldest()
						->orWhere('nombre_fase', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre_fase = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_fase' => 'required',
		'descripcion' => 'required',
        ]);

        Fase::create([ 
			'nombre_fase' => $this-> nombre_fase,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Fase Successfully created.');
    }

    public function edit($id)
    {
        $record = Fase::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_fase = $record-> nombre_fase;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
		'nombre_fase' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Fase::find($this->selected_id);
            $record->update([ 
			'nombre_fase' => $this-> nombre_fase,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Fase Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Fase::where('id', $id)->delete();
        }
    }
}