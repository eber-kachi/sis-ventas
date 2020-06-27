<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1, 100),
        'order_id' => $faker->numberBetween(1, 3),
        'sub_total' => $faker->numberBetween(40, 100),
        'quantity' => $faker->numberBetween(40, 100)
    ];
});
