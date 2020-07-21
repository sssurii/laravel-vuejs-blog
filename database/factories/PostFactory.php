<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker, $attributes) {
    $user_id = $attributes['user_id'] ?? (factory(User::class)->create())->id;
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'content' => $faker->realText($faker->numberBetween(10, 200)),
        'user_id' => $user_id,
        'meta' => [
            'tags' => $faker->words($nbWords = 3, $asText = false)
        ],
        'status' => 1,
        'published_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
    ];
});
