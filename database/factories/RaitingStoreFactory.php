<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\RaitingStore::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1, 5),
        'store_id'=>$faker->numberBetween(1, 5),
        'comentary'=>$faker->text,
    ];
});
