<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Goods;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GoodsFactory extends Factory
{
    protected $model = Goods::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory()->create()->id,
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'availability' => $this->faker->boolean(),
            'color' => $this->faker->colorName(),
            'price' => $this->faker->numberBetween(500, 1500),
        ];
    }

    public function withSizes()
    {
        return $this->afterCreating(function (Goods $goods) {
            $goods->sizes()->sync(Size::inRandomOrder()->get());
        });
    }
}
