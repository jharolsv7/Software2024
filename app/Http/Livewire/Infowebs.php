<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads; // Agrega esta línea
use App\Models\Infoweb;
use Illuminate\Support\Facades\Storage; // Agrega esta línea

class Infowebs extends Component
{
    use WithPagination;
    use WithFileUploads; // Agrega esta línea

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha_campeonato, $foto_sitio, $informacion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.infowebs.view', [
            'infowebs' => Infoweb::oldest()
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
        'foto_sitio' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $this->foto_sitio->store('img', 'public');

        Infoweb::create([ 
			'fecha_campeonato' => $this-> fecha_campeonato,
			'foto_sitio' => $imagePath,
			'informacion' => $this-> informacion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Infoweb creado exitosamente.');
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
    
            $data = [
                'fecha_campeonato' => $this->fecha_campeonato,
                'informacion' => $this->informacion,
            ];
    
            if ($this->foto_sitio instanceof \Illuminate\Http\UploadedFile) {
                // Elimina la imagen anterior si existe.
                if ($record->foto_sitio) {
                    Storage::disk('public')->delete($record->foto_sitio);
                }
    
                // Almacena la nueva imagen.
                $imagePath = $this->foto_sitio->store('img', 'public');
                $data['foto_sitio'] = $imagePath;
            }
    
            $record->update($data);
    
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Infoweb actualizado exitosamente.');
        }
    }      

    public function destroy($id)
    {
        if ($id) {
            Infoweb::where('id', $id)->delete();
        }
    }
}