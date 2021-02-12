<?php

use Faker\Generator as Faker;

$factory->define(App\offer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'start_date' => $faker->date,
        'finish_date' => $faker->date,
        'start_time' => $faker->time,
        'finish_time' => $faker->time,
        'assessment' => $faker->randomDigit,
        'enterprise_id'=> \App\enterprise::all()->random()->id,
    ];
});
