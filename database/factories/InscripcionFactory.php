<?php

namespace Database\Factories;

use App\Models\Inscripcion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InscripcionFactory extends Factory
{
    protected $model = Inscripcion::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
			'monto' => $this->faker->name,
			'fecha' => $this->faker->name,
			'estado' => $this->faker->name,
			'equipo_id' => $this->faker->name,
        ];
    }
}
