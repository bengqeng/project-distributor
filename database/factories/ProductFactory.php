<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->realText(200),
            'category_id' => $this->faker->randomDigit(),
            'images_1' => $this->faker->randomDigit(),
            'images_2' => $this->faker->randomDigit(),
            'images_3' => $this->faker->randomDigit(),
            'images_4' => $this->faker->randomDigit(),
        ];
    }
}
