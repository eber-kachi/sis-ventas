<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'product_id'=>$faker->numberBetween(1,100),
        'title' => $faker->title,
        'image' => $faker->imageUrl(),
        'ismain' => $faker->boolean
    ];
});
