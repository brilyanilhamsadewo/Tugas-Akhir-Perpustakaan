<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Penerbit;
use Faker\Generator as Faker;

$factory->define(Penerbit::class, function (Faker $faker) {
    return [
        'nama_penerbit' => $faker->sentence($nbWords = 1, $variableNbWords = true),
    ];
});
