<?php

namespace Database\Factories;

use App\Models\Sancionjugador;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SancionjugadorFactory extends Factory
{
    protected $model = Sancionjugador::class;

    public function definition()
    {
        return [
			'jugador_id' => $this->faker->name,
			'detalles' => $this->faker->name,
			'fecha' => $this->faker->name,
			'monto' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
