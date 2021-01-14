<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Rak;
use Faker\Generator as Faker;

$factory->define(Rak::class, function (Faker $faker) {
    return [
        'nama_rak' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'lokasi_rak' => $faker->sentence($nbWords = 1, $variableNbWords = true),
    ];
});
