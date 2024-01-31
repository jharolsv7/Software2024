<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Goleadore;
use App\Models\Jugador;

class GoleadoresTable extends Component
{
    public $keyWord;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $goleadores = Goleadore::where('jugador_id', 'LIKE', $keyWord)
            ->orWhere('partido_id', 'LIKE', $keyWord)
            ->orderByDesc('goles', 'LIKE', $keyWord)
            ->paginate(10);

        return view('livewire.goleadores.table', compact('goleadores'));
    }
}