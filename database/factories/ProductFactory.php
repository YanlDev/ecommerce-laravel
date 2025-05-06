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
        return [
            'sku'=> $this->faker->unique()->numberBetween($min = 100000, $max = 999999),
            'name'=> $this->faker->sentence(),
            'description'=> $this->faker->text(200),
            'image_path' => 'products/'.$this->faker->image('public/storage/products',640,480, null, false),
            'price'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1000),
            'subcategory_id' =>  $this->faker->numberBetween($min = 1, $max = 632),
        ];
    }
}
