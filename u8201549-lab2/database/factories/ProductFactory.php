<?php

namespace Database\Factories;
use App\Models\Category;
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
    public function definition(): array
    {
        $name= fake()->sentence();
        
        return [
            'name' => $name,
            'code' => Str::slug($name),
            'description' => $this->faker->text,
            'created_at_datetime' => $this->faker->dateTime,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'image' => $this->faker->imageUrl(),
            'quantity' => $this->faker->randomNumber(2),
            'category_id' => function () {
                return Category::all()->random();
            },
        ];
    }
}
