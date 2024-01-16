<?php

namespace Database\Factories;

use App\Models\Sancion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SancionFactory extends Factory
{
    protected $model = Sancion::class;

    public function definition()
    {
        return [
			'tipo' => $this->faker->name,
			'monto' => $this->faker->name,
			'fecha' => $this->faker->name,
			'jugador_id' => $this->faker->name,
        ];
    }
}
