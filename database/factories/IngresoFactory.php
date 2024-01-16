<?php

namespace Database\Factories;

use App\Models\Ingreso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IngresoFactory extends Factory
{
    protected $model = Ingreso::class;

    public function definition()
    {
        return [
			'detalles' => $this->faker->name,
			'monto' => $this->faker->name,
        ];
    }
}
