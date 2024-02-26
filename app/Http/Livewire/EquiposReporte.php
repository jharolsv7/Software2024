<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Equipo;

class EquiposReporte extends Component
{
    public $keyWord;
    public $grupo;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.equipos.reporte', [
            'equipos' => Equipo::oldest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('logo', 'LIKE', $keyWord)
						->orWhere('eslogan', 'LIKE', $keyWord)
						->orWhere('nombreMadrina', 'LIKE', $keyWord)
						->orWhere('inscripcionMonto', 'LIKE', $keyWord)
						->orderByDesc('puntos', 'LIKE', $keyWord)
						->orWhere('grupo', 'LIKE', $keyWord)
						->orWhere('goles_a_favor', 'LIKE', $keyWord)
						->orWhere('goles_en_contra', 'LIKE', $keyWord)
						->paginate(6),
        ]);
    }
}