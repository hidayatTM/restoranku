<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ItemFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10000, 1000000),
            // 'category_id' => \App\Models\Category::factory(),
            'category_id' => $this->faker->numberBetween(1, 3),
            'img' => $this->faker->imageUrl(640, 480, 'food', true),
            'is_active' => $this->faker->boolean(),

        ];
    }
}
