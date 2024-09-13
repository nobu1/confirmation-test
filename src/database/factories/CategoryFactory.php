<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if ($this->faker->numberBetween(1,5) === 1) {
            return ['content' => "delivery",];
        } elseif ($this->faker->numberBetween(1,5) === 2) {
            return ['content' => "replace",];
        } elseif ($this->faker->numberBetween(1,5) === 3) {
            return ['content' => "trouble",];
        } elseif ($this->faker->numberBetween(1,5) === 4) {
            return ['content' => "contact",];
        } else {
            return ['content' => "others",];
        }
    }
}
