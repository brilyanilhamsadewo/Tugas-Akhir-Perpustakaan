<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anggota;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Anggota::class, function (Faker $faker) {

    $randomNis = rand(1,100);
    $nis = "2018{$randomNis}";

    $randomTelp = rand(1,100);
    $telp = "085735917{$randomTelp}";

    return [
        'nama' => $faker->name,
        'tahun_masuk' => '2018',
        'jenis_kelamin' => 'L',
        'nis/nig' => $nis,
        'no_telp' => $telp,
    ];
});
