<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->email(),
        'address' => $faker->address(),
        'phone' => $faker->phoneNumber()
    ];
});
