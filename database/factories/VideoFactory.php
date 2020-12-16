<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomDigitNotNull,
        'photo_path' => $this->faker->word,
        'photo_base_path' => $this->faker->word,
        'created_at' => $this->faker->randomDigitNotNull,
        'updated_at' => $this->faker->randomDigitNotNull
        ];
    }
}
