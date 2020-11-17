<?php

namespace Database\Factories;

use App\Models\RegionModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RegionModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => $this->faker->word,
        'created_at' => $this->faker->randomDigitNotNull
        ];
    }
}
