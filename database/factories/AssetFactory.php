<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Asset::class, function (Faker $faker) {
    return [
        // 'photo' => '/upload/data-upload/test-image/tips-dan-cara-jitu-cari-perumahan-murah.jpg',
        'category_id' => rand(1,3),
        'location_id' => rand(1,3),
        'property' => $faker->word,
        'merk' => $faker->word,
        'model' => $faker->word,
        'serial_number' => 1234567,
        'capacity' => rand(111,999),
        'purcashed_at' => '2018-09-21',
        'supplier_id' => rand(1,3),
        'description' => $faker->paragraph,
    ];
});
