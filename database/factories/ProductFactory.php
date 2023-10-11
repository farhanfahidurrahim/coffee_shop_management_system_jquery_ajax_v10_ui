<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
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
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->name),
            'image' => $this->faker->imageUrl,
            // 'image' => $this->faker->image(null, 400, 300, 'food', false),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['drink', 'dessert']),
        ];
    }
}
