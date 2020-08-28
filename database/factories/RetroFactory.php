<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Retro;
use Faker\Generator as Faker;

$factory->define(Retro::class, function (Faker $faker) {
    $statuses = ['draft', 'publish', 'archive'];
    
    return [
        'owner_id' => $faker->numberBetween(1,100),
        'title' => ucwords($faker->words(3, true)),
        'description' => $faker->paragraph(3, true),
        'status' => $statuses[array_rand($statuses)],
    ];
});
