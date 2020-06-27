<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'store_id'=>$faker->numberBetween(1, 5),
        'sub_category_id'=>$faker->numberBetween(1, 10),
        'title'=>$faker->firstName,
        'price'=>$faker->numberBetween(30, 200),
        'description'=>$faker->text,
        'stock'=>$faker->numberBetween(5, 200)
    ];
});
