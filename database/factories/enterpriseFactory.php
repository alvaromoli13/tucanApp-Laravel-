<?php

use Faker\Generator as Faker;

$factory->define(App\enterprise::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->sentence,
        'type' => $faker->name,
        'logo' => $faker->name,
        'own'=> \App\User::all()->random()->id,
     ];
});
