<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\URL;

class MitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = ['client', 'rekanan'];
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'type' => $data[rand(0, 1)]
        ];
    }
}
