<?php

namespace Database\Factories;

use App\Models\StaticPages;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaticPagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StaticPages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'view' => $this->faker->word,
        'status' => $this->faker->word,
        'created_at' => $this->faker->randomDigitNotNull,
        'updated_at' => $this->faker->randomDigitNotNull
        ];
    }
}
