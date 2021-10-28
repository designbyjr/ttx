<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomersFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'utr' => $this->faker->unique()->randomNumber(8),
            'dob' => $this->faker->dateTimeBetween('-30 years','-18 years')->format('Y-m-d'),
            'phone' => $this->faker->phoneNumber()
        ];
    }
}
