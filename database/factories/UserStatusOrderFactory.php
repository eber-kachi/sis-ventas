<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\UserStatusOrder::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1, 5),
        'status_order_id'=>$faker->numberBetween(1, 8),
    ];
});
