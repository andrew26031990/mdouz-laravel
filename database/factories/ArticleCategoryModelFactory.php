<?php

namespace Database\Factories;

use App\Models\ArticleCategoryModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCategoryModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleCategoryModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'menu' => $this->faker->word,
        'created_at' => $this->faker->randomDigitNotNull,
        'updated_at' => $this->faker->randomDigitNotNull
        ];
    }
}
