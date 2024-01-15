<?php

namespace Database\Factories;

use App\Models\Jugadore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JugadoreFactory extends Factory
{
    protected $model = Jugadore::class;

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
