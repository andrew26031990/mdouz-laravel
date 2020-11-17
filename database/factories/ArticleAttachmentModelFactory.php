<?php

namespace Database\Factories;

use App\Models\ArticleAttachmentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleAttachmentModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleAttachmentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => $this->faker->randomDigitNotNull,
        'path' => $this->faker->word,
        'base_url' => $this->faker->word,
        'type' => $this->faker->word,
        'size' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word,
        'created_at' => $this->faker->randomDigitNotNull,
        'order' => $this->faker->randomDigitNotNull
        ];
    }
}
