<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Store::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1, 5),
        'email'=>$faker->email,
        'name'=>$faker->name,
        'phone'=>$faker->phoneNumber,

    ];
});
