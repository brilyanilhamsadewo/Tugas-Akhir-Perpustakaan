<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Member;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    $randomNumberNisNip = rand(1,10000);
    $nis_nip = "18086{$randomNumberNisNip}";

    $randomNumberNoTelpMember = rand(1,100);
    $no_telp_member = "18086{$randomNumberNoTelpMember}";

    return [
        'nis_nip' => $nis_nip,
        'nama_member' => $faker->name,
        'jenis_kelamin' => 'L',
        'no_telp_member' => $faker->phoneNumber,
        'email_member' => $faker->email,
        'alamat_member' => $faker->address,
    ];
});
