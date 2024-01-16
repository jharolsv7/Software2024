<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Infoweb;

class Infowebs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha_campeonato, $foto_sitio, $informacion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.infowebs.view', [
            'infowebs' => Infoweb::latest()
						->orWhere('fecha_campeonato', 'LIKE', $keyWord)
						->orWhere('foto_sitio', 'LIKE', $keyWord)
						->orWhere('informacion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->fecha_campeonato = null;
		$this->foto_sitio = null;
		$this->informacion = null;
    }

    public function store()
    {
        $this->validate([
		'fecha_campeonato' => 'required',
        ]);

        Infoweb::create([ 
			'fecha_campeonato' => $this-> fecha_campeonato,
			'foto_sitio' => $this-> foto_sitio,
			'informacion' => $this-> informacion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Infoweb Successfully created.');
    }

    public function edit($id)
    {
        $record = Infoweb::findOrFail($id);
        $this->selected_id = $id; 
		$this->fecha_campeonato = $record-> fecha_campeonato;
		$this->foto_sitio = $record-> foto_sitio;
		$this->informacion = $record-> informacion;
    }

    public function update()
    {
        $this->validate([
		'fecha_campeonato' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Infoweb::find($this->selected_id);
            $record->update([ 
			'fecha_campeonato' => $this-> fecha_campeonato,
			'foto_sitio' => $this-> foto_sitio,
			'informacion' => $this-> informacion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Infoweb Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Infoweb::where('id', $id)->delete();
        }
    }
}