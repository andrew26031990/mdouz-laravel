<?php

namespace Database\Factories;

use App\Models\TimelineEventModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimelineEventModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimelineEventModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'application' => $this->faker->word,
        'category' => $this->faker->word,
        'event' => $this->faker->word,
        'data' => $this->faker->text,
        'created_at' => $this->faker->randomDigitNotNull
        ];
    }
}
