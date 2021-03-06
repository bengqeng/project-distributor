<?php
namespace Database\Factories;

use App\Models\CategoryProduct;
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
        $category = CategoryProduct::inRandomOrder()->first();
        return [
            'title'       => $this->faker->sentence(10),
            'description' => $this->faker->realText(200),
            'tabdesc'     => $this->faker->realText(200),
            'howtouse'    => $this->faker->realText(200),
            'ingredients' => $this->faker->realText(200),
            'category_id' => $category->id,
        ];
    }
}
