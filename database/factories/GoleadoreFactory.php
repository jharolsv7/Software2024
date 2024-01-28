<?php

namespace Database\Factories;

use App\Models\Goleadore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GoleadoreFactory extends Factory
{
    protected $model = Goleadore::class;

    public function definition()
    {
        return [
			'partido_id' => $this->faker->name,
			'jugador_id' => $this->faker->name,
			'goles' => $this->faker->name,
        ];
    }
}
