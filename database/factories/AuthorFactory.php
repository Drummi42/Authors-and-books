<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Library\Author;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Author::class, function (Faker $faker) {
    $name = $faker->firstName;
    $surname = $faker->lastName;
    $slug = Str::slug($name.' '.$surname);
    return [
        'name'      => $name,
        'surname'   => $surname,
        'slug'      => $slug,
    ];
});
