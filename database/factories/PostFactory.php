<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->realText($this->faker->numberBetween(10, 200)),
            'user_id' => (User::factory()->create())->id,
            'meta' => [
                'tags' => $this->faker->words($nbWords = 3, $asText = false)
            ],
            'status' => config('constants.STATUS.PUBLISHED'),
            'published_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
        ];
    }
}
