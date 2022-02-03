<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->firstname(),
            'surname'=> $this->faker->lastname(),
            'username'=> $this->faker->firstname(),
            'description'=> $this->faker->sentence(5)
        ];
    }
}
