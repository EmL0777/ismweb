<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\ServiceCenter;
use Faker\Generator as Faker;

$factory->define(ServiceCenter::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'address' => $faker->address,
        'phone1' => $faker->e164PhoneNumber,
        'phone2' => $faker->e164PhoneNumber,
        'fax' => $faker->e164PhoneNumber,
        'email' => $faker->companyEmail,
        'attn' => $faker->name(),
        'continent' => $faker->state,
        'country' => $faker->country,
    ];
});
