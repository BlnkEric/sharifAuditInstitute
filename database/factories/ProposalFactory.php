<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'company_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'description' => $this->faker->text(),
            'file_path' => 'seed',
        ];
    }
}
