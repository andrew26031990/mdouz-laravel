<?php

namespace Database\Factories;

use App\Models\KeyStorage;
use Illuminate\Database\Eloquent\Factories\Factory;

class KeyStorageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KeyStorage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->text,
        'comment' => $this->faker->text,
        'updated_at' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->randomDigitNotNull
        ];
    }
}
