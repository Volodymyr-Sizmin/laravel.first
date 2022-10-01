<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->unique()->words(rand(1,3), true),
            'description' => fake()->realTextBetween(100, 200, 2),
            'short_description' => fake()->realText(70),
            'SKU' => fake()->unique()->ean8(),
            'price' => fake()->randomFloat(2,1 ,999),
            'discount' => fake()->randomElement($array = [10, 20, 30, 50, 70]),
            'in_stock' => rand(1,100),
            'thumbnail' => fake()->imageUrl(category: 'cars', randomize: true)
        ];
    }
}
