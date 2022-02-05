<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;


class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    #[ArrayShape(['description' => "string", 'valor' => "int", 'data' => "string"])] public function definition()
    {
        return [
            'description' => $this->faker->text(100),
            'valor' => random_int(1000, 9999),
            'data' => $this->faker->date
        ];
    }
}
