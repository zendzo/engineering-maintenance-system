<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\MaintenanceEvent::class, function (Faker $faker) {
    $date = Carbon::today();
    $colors = [
        '#00a65a', //green
        '#f39c12', //yellow
        '#00c0ef', //aqua
        '#3c8dbc', //primary
        '#dd4b39'  //danger
    ];

    return [
        'title' => $faker->word,
        'all_day' => true,
        'start' => $date,
        'end' => $date->addDays(rand(7,10)),
        'background_color' => $colors[rand(0,4)],   
    ];
});
