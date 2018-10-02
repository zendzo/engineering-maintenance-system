<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\WorkOrder::class, function (Faker $faker) {
    return [
        'finish_at' => Carbon::now(),
        'priority' => rand(1,3),
        'location_id' => rand(1,5),
        'category_id' => rand(1,5),
        'job' => $faker->sentence,
        'order_by' => 1,
        'follow_up' => rand(2,5),
        'department_id' => rand(1,2),
        'status' => rand(0,3),
        // 'photo' => '/upload/data-upload/test-image/tips-dan-cara-jitu-cari-perumahan-murah.jpg'
    ];
});
