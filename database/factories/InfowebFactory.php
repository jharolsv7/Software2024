<?php

namespace Database\Factories;

use App\Models\Infoweb;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InfowebFactory extends Factory
{
    protected $model = Infoweb::class;

    public function definition()
    {
        return [
			'fecha_campeonato' => $this->faker->name,
			'foto_sitio' => $this->faker->name,
			'informacion' => $this->faker->name,
        ];
    }
}
