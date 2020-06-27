<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Sends::class, function (Faker $faker) {
    return [
        'cost'=> $faker->randomElement(['sends1','sends2', 'sends3'])
    ];
});
