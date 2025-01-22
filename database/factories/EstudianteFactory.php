<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'                 => fake()->name(),
            'correo'                 => fake()->safeEmail(),
            'fecha_nacimiento'       => fake()->date(),
            'direccion'              => fake()->address(),
        ];
    }
}
