<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        'category_id' => $faker -> numberBetween(1, 10),
        'name' => $faker -> title
    ];
});
