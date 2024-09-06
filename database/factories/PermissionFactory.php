<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'target_id' => 1,
            'role_id' => $this->faker->randomElement([1,2,3])

        ];
    }
}
