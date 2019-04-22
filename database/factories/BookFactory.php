<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Library\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    $title          = $faker->words(3, true);
    $description    = $faker->text(150);
    $slug           = Str::slug($title);

    return [
        'title'         => $title,
        'description'   => $description,
        'slug'          => $slug,
    ];
});
