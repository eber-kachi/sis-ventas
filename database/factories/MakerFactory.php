<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Maker::class, function (Faker $faker) {
    return [
        'product_id'=> $faker->numberBetween(1, 100),
        'name'=> $faker->name,
        'location'=> $faker->locale,
        'phone'=> $faker->phoneNumber
    ];
});
