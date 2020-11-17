<?php

namespace Database\Factories;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->word,
        'auth_key' => $this->faker->word,
        'access_token' => $this->faker->word,
        'password_hash' => $this->faker->word,
        'oauth_client' => $this->faker->word,
        'oauth_client_user_id' => $this->faker->word,
        'email' => $this->faker->word,
        'status' => $this->faker->word,
        'created_at' => $this->faker->randomDigitNotNull,
        'updated_at' => $this->faker->randomDigitNotNull,
        'logged_at' => $this->faker->randomDigitNotNull
        ];
    }
}
