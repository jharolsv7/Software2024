<?php

namespace Database\Factories;

use App\Models\Egreso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EgresoFactory extends Factory
{
    protected $model = Egreso::class;

    public function definition()
    {
        return [
			'detalles' => $this->faker->name,
			'monto' => $this->faker->name,
        ];
    }
}
