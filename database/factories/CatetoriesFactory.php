<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CatetoriesFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
        ];
    }
}
