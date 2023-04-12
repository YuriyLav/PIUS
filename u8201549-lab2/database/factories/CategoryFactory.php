<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
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
            'activity' => $this->faker->boolean,
            'created_at_date' => $this->faker->date,
            'parent_id' => mt_rand(1, 100)
        ];
    }
}
