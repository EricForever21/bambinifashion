<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [            
            'id' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->text(20),
            'price' => $this->faker->randomFloat(2, 10,1000),
            'brandid' => Brand::all()->random()->id,
        ];
    }
}
