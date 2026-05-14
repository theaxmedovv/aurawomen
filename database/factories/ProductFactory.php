<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition()
    {
        $name = $this->faker->unique()->words(3, true);
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(100, 999),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->randomFloat(2, 10, 300),
            'sale_price' => $this->faker->optional(0.3)->randomFloat(2, 5, 250),
            'stock' => $this->faker->numberBetween(0, 600),
            'category' => $this->faker->randomElement(['Perfumes','Skincare','Makeup','Sets','Beauty Products']),
            'is_bestseller' => $this->faker->boolean(20),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'image' => null,
        ];
    }
}
