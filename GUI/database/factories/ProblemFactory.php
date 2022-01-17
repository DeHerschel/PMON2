<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'type' => $this->faker->randomElement(['down', 'lost', 'other']),
            'date' => now(),
            'description' => $this->faker->text(),
            'target' => $this->faker->randomElement([1, 2, 3])
        ];
    }
}
