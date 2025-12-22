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
            'img' => fake()->randomElement(
                [
                    'https://images.unsplash.com/photo-1623341214825-9f4f963727da',
                    'https://plus.unsplash.com/premium_photo-1668143358351-b20146dbcc02',
                    'https://images.unsplash.com/photo-1751094364516-02b351f9c277',
                    'https://images.unsplash.com/photo-1706703200781-0c539fc955d3',

                ]
            ),
            'is_active' => $this->faker->boolean(),

        ];
    }
}
