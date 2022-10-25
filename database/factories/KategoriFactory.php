<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arr = [
            '',
            'Update',
            'Kuliner',
            'Info',
            'Kesehatan'
        ];
        return [
            'title' => $arr[rand(1, 4)],
            'description' => $this->faker->paragraph(2),
            'created_by' => 1
        ];
    }
}
