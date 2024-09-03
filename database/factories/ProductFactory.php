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
    public function definition(): array
    {
        $product_name = [
            'Tshirt', 
            'Cup', 
            'Blanket', 
            'Sweater', 
            'Pants', 
            'Sneakers'
        ];
        
        return [
            'name' => $this->faker->unique()->randomElement($product_name),
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->numberBetween(50_00, 4500_00),
        ];
    }
}
