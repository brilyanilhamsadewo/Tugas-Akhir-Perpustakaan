<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'categories_name' => $faker->sentence($nbWords = 1, $variableNbWords = true),
    ];
});
