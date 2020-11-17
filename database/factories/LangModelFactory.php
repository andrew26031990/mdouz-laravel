<?php

namespace Database\Factories;

use App\Models\LangModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class LangModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LangModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->word,
        'local' => $this->faker->word,
        'name' => $this->faker->word,
        'default' => $this->faker->word,
        'date_update' => $this->faker->randomDigitNotNull,
        'date_create' => $this->faker->randomDigitNotNull
        ];
    }
}
