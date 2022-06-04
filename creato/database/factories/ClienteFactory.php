<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'nit' => $this->faker->unique()->numberBetween(1000000, 9999999),
            'direccion' => $this->faker->address(20),
            'telefono' => $this->faker->isbn10(),
            'extension' => $this->faker->numberBetween(1, 9999),
            'correo' => $this->faker->unique()->safeEmail(),
            'ciudad' => $this->faker->city(),                    
        ];
    }
}
