<?php

namespace Database\Factories;

use App\Models\CurrencyModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrencyModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'code' => $this->faker->word,
        'exchange_rate' => $this->faker->randomDigitNotNull,
        'default' => $this->faker->word
        ];
    }
}
