<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Issue;
use App\User;
use Faker\Generator as Faker;

$factory->define(Issue::class, function (Faker $faker) {
    $categories = [
        'Liked',
        'Learned',
        'Lacked',
        'Longed For',
    ];
    $userCount = User::count();
    
    return [
        'retro_id' => 1,
        'owner_id' => $faker->numberBetween(1, $userCount),
        'description' => $faker->text,
        'category' => $categories[array_rand($categories)],
    ];
});
