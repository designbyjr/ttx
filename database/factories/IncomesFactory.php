<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IncomesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->name(),
            'description' => $this->faker->realText(),
            'income' => $this->faker->randomFloat(2,2,5),
            'income_date' => $this->faker->dateTimeBetween('-5 years','now')->format('Y-m-d'),
            'tax_year' => $this->faker->dateTimeBetween('-4 years','now')->format('Y'),
        ];
    }
}
