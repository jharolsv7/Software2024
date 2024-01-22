<?php

namespace App\Http\Livewire;

use App\Models\Partido;
use Livewire\Component;

class PartidosTable extends Component
{
    public $keyWord;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $partidos = Partido::where('equipo_uno', 'LIKE', $keyWord)
            ->orWhere('equipo_dos', 'LIKE', $keyWord)
            ->orWhere('ubicacion', 'LIKE', $keyWord)
            ->orWhere('fecha', 'LIKE', $keyWord)
            ->orderBy('fecha', 'asc') // Ordenar por la fecha en orden ascendente, puedes ajustarlo según tus necesidades
            ->paginate(10);

        return view('livewire.partidos.table', compact('partidos'));
    }
}