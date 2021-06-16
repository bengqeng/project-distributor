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
            'title'       => $this->faker->sentence(10),
            'description' => $this->faker->realText(200),
            'slug'        => $this->faker->slug(),
            'tabdesc'     => $this->faker->realText(200),
            'howtouse'    => $this->faker->realText(200),
            'ingredients' => $this->faker->realText(200),
            'category_id' => $this->faker->randomDigitNotZero(1),
            'images_1'    => $this->faker->randomDigitNotZero(1),
            'images_2'    => $this->faker->randomDigitNotZero(1),
            'images_3'    => $this->faker->randomDigitNotZero(1),
            'images_4'    => $this->faker->randomDigitNotZero(1),
        ];
    }
}
