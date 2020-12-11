<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\About;
use App\Entities\About_i18n;
use Faker\Generator as Faker;

$factory->define(About::class, function (Faker $faker) {
    return [
        'intro' => $faker->text(20),
        'event_year_month' => $faker->date('Y-m-d', 'now'),
        'position' => 0,
    ];
});

$factory->define(About_i18n::class, function (Faker $faker) {
    return [
        'languages' => 'en',
        'title' => $faker->text(20),
        'content' => $faker->text(200),
    ];
});
