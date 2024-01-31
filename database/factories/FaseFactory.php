<?php

namespace Database\Factories;

use App\Models\Fase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FaseFactory extends Factory
{
    protected $model = Fase::class;

    public function definition()
    {
        return [
			'nombre_fase' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
