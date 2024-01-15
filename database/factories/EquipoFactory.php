<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EquipoFactory extends Factory
{
    protected $model = Equipo::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'logo' => $this->faker->name,
			'eslogan' => $this->faker->name,
			'nombreMadrina' => $this->faker->name,
			'inscripcionMonto' => $this->faker->name,
			'puntos' => $this->faker->name,
			'grupo' => $this->faker->name,
			'goles_a_favor' => $this->faker->name,
			'goles_en_contra' => $this->faker->name,
        ];
    }
}
