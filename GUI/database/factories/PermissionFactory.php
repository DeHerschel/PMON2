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
            'target_id' => $this->faker->unique()->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'role_id' => $this->faker->randomElement([1,2,3])

        ];
    }
}
