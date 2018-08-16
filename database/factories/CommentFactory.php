<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    $time = now()->subSeconds(rand(1, 60*60*48));
    return [
        'text' => $faker->sentence,
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
