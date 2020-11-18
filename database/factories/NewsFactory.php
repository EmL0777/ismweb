<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\News;
use App\Entities\News_i18n;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'display' => 1,
        'pinned' => 0,
    ];
});

$factory->define(News_i18n::class, function (Faker $faker) {
    return [
        'languages' => 'en',
        'title' => $faker->text(10),
        'content' => $faker->text(200),
    ];
});
