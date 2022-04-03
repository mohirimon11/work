<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_id' => $this->faker,
            'name' => $this->faker->name(),
            'roll' => $this->faker->randomNumber(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
