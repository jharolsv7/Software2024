<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jugador;

class JugadorsTable extends Component
{
    public $keyWord;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $jugadores = Jugador::where('nombre', 'LIKE', $keyWord)
            ->orWhere('equipo_id', 'LIKE', $keyWord)
            ->paginate(10);

        return view('livewire.jugadors.table', compact('jugadores'));
    }
}