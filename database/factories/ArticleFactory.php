<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'view' => $this->faker->word,
        'category_id' => $this->faker->randomDigitNotNull,
        'thumbnail_base_url' => $this->faker->word,
        'thumbnail_path' => $this->faker->word,
        'status' => $this->faker->word,
        'on_main' => $this->faker->word,
        'on_home' => $this->faker->word,
        'menu' => $this->faker->word,
        'created_by' => $this->faker->randomDigitNotNull,
        'updated_by' => $this->faker->randomDigitNotNull,
        'published_at' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->randomDigitNotNull,
        'updated_at' => $this->faker->randomDigitNotNull,
        'url' => $this->faker->word
        ];
    }
}
