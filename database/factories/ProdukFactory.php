<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(2, true),
            'slug' => $this->faker->slug(2, true),
            'body' => $this->faker->paragraph(12, true)
        ];
    }
}
