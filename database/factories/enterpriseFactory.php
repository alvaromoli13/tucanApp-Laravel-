<?php

use Faker\Generator as Faker;

$factory->define(App\enterprise::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->sentence,
        'type' => $faker->name,
        'logo' => $faker->name,
        'state' => $faker->name,
        'city' => $faker->name,
        'subtype' => $faker->name,
        'own'=> \App\User::all()->random()->id,
     ];
});
