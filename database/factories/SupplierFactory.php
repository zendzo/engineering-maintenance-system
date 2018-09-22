<?php

use Faker\Generator as Faker;

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->streetAddress,
        'phone' => $faker->phoneNumber,
    ];
});
