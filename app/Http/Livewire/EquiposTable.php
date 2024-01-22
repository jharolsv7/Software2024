<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Equipo;

class EquiposTable extends Component
{
    public $keyWord;
    public $grupo;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $equipos = Equipo::where('grupo', $this->grupo)
            ->where(function ($query) use ($keyWord) {
                $query->orWhere('nombre', 'LIKE', $keyWord)
                    ->orWhere('logo', 'LIKE', $keyWord)
                    ->orWhere('eslogan', 'LIKE', $keyWord)
                    ->orWhere('nombreMadrina', 'LIKE', $keyWord)
                    ->orWhere('inscripcionMonto', 'LIKE', $keyWord)
                    ->orWhere('puntos', 'LIKE', $keyWord)
                    ->orWhere('grupo', 'LIKE', $keyWord)
                    ->orWhere('goles_a_favor', 'LIKE', $keyWord)
                    ->orWhere('goles_en_contra', 'LIKE', $keyWord);
            })
            ->orderByDesc('puntos') // Agregar esta línea para ordenar por puntos de mayor a menor
            ->paginate(10);

        return view('livewire.equipos.table', compact('equipos'));
    }
}