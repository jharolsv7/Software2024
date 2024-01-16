<?php

namespace Database\Factories;

use App\Models\Jugador;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JugadorFactory extends Factory
{
    protected $model = Jugador::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'numero' => $this->faker->name,
			'numeroGoles' => $this->faker->name,
			'equipo_id' => $this->faker->name,
        ];
    }
}
