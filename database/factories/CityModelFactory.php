<?php

namespace Database\Factories;

use App\Models\CityModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CityModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'region_id' => $this->faker->word,
        'created_at' => $this->faker->randomDigitNotNull
        ];
    }
}
