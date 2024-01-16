<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ingreso;

class Ingresos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $detalles, $monto;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.ingresos.view', [
            'ingresos' => Ingreso::latest()
						->orWhere('detalles', 'LIKE', $keyWord)
						->orWhere('monto', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->detalles = null;
		$this->monto = null;
    }

    public function store()
    {
        $this->validate([
		'detalles' => 'required',
		'monto' => 'required',
        ]);

        Ingreso::create([ 
			'detalles' => $this-> detalles,
			'monto' => $this-> monto
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Ingreso Successfully created.');
    }

    public function edit($id)
    {
        $record = Ingreso::findOrFail($id);
        $this->selected_id = $id; 
		$this->detalles = $record-> detalles;
		$this->monto = $record-> monto;
    }

    public function update()
    {
        $this->validate([
		'detalles' => 'required',
		'monto' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Ingreso::find($this->selected_id);
            $record->update([ 
			'detalles' => $this-> detalles,
			'monto' => $this-> monto
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Ingreso Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Ingreso::where('id', $id)->delete();
        }
    }
}