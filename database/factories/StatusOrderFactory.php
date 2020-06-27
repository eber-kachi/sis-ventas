<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\StatusOrder::class, function (Faker $faker) {
    return [
        'order_id'=>$faker->numberBetween(1, 10),
        'status'=>$faker->randomElement(['Bueno','Malo'])
    ];
});
