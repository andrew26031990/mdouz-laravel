<?php

namespace Database\Factories;

use App\Models\FooterMenu;
use Illuminate\Database\Eloquent\Factories\Factory;

class FooterMenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FooterMenu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'key' => $this->faker->word,
        'status' => $this->faker->word
        ];
    }
}
