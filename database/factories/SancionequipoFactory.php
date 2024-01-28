<?php

namespace Database\Factories;

use App\Models\Sancionequipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SancionequipoFactory extends Factory
{
    protected $model = Sancionequipo::class;

    public function definition()
    {
        return [
			'equipo_id' => $this->faker->name,
			'detalles' => $this->faker->name,
			'fecha' => $this->faker->name,
			'monto' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
