<?php

namespace Database\Factories;

use App\Models\Partido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartidoFactory extends Factory
{
    protected $model = Partido::class;

    public function definition()
    {
        return [
			'fecha' => $this->faker->name,
			'hora' => $this->faker->name,
			'ubicacion' => $this->faker->name,
			'golesEquipo1' => $this->faker->name,
			'golesEquipo2' => $this->faker->name,
			'tarjetaAmarilla' => $this->faker->name,
			'tarjetaRoja' => $this->faker->name,
			'equipo_uno' => $this->faker->name,
			'equipo_dos' => $this->faker->name,
        ];
    }
}
