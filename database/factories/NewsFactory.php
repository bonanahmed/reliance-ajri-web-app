<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'slug' => $this->faker->slug(3, false),
            'kategori_id' => $this->faker->randomDigitNotNull(),
            'created_by' => 1,
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph(10, true),

        ];
    }
}
