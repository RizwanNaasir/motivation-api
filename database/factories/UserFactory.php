<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'age' => array_rand([22, 33, 66, 22]),
            'gender' => array_rand(['male', 'female', 'N/A']),
            'favorite_hobby' => $this->faker->word(),
            'personality_type' => $this->faker->word(),
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
