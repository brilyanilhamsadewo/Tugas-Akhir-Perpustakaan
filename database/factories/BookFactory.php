<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use App\Book;
use App\Category;
use App\Penerbit;
use App\Rak;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    $randomNumber = rand(1,100);
    $cover = "https://picsum.photos/id/{$randomNumber}/200/300";

    $randomNumberISSN = rand(1,100);
    $issn = "192168100{$randomNumberISSN}";

    return [
        'author_id' => Author::inRandomOrder()->first()->id,
        'category_id' => Category::inRandomOrder()->first()->id,
        'penerbit_id' => Penerbit::inRandomOrder()->first()->id,
        'rak_id' => Rak::inRandomOrder()->first()->id,
        'title' => $faker->sentence(4),
        'issn' => $issn,
        'description' => $faker->sentence(50),
        'cover' => $cover,
        'qty' => rand(10,20),
    ];
});
